<?php

namespace App\Http\Controllers;

use App\Events\CustomerMessage;
use App\Events\RestaurantMessage;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

class ChatBotController extends Controller
{
    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $apiKey = config('services.openai.key');

        // Phân loại intent
        $intent = $this->classifyIntent($prompt, $apiKey);

        // Gửi prompt chính để tạo phản hồi nền
        $reply = $this->getChatResponse($prompt, $apiKey);

        // Nếu là tư vấn, tìm trong DB
        if (str_contains($intent, 'Tư vấn') || str_contains($intent, 'Giá cả')) {
            $keywords = $this->extractKeywords($prompt, $apiKey);

            // Xử lý tìm món theo từ khóa và giá nếu có
            $query = MenuItem::query();

            $query->where(function ($q) use ($keywords, $prompt) {
                $q->whereRaw('LOWER(Title_items) LIKE ?', ['%' . strtolower($prompt) . '%'])
                    ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($prompt) . '%']);
                foreach ($keywords as $keyword) {
                    $q->orWhereRaw('LOWER(Title_items) LIKE ?', ['%' . strtolower($keyword) . '%'])
                        ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($keyword) . '%']);
                }
            });

            // Thêm tìm kiếm theo giá nếu có số tiền trong prompt
            if (preg_match('/(\d{1,3}(?:[.,]\d{3})*)\s?đ/', $prompt, $matches)) {
                $price = (int)str_replace(['.', ','], '', $matches[1]);
                $query->orWhereBetween('Price', [$price - 5000, $price + 5000]);
            }

            $foundItems = $query->take(3)->get(); // Gợi ý tối đa 3 món

            if ($foundItems->count()) {
                $suggestions = $foundItems->map(function ($item) {
                    return "- 🍽️ {$item->Title_items} ({$item->Price} VNĐ)";
                })->implode("\n");
                $reply = "Dưới đây là một số món bạn có thể quan tâm:\n\n" . $suggestions;
            } else {
                $reply .= "\n\nHiện tại chưa tìm thấy món phù hợp, bạn vui lòng thử lại với từ khóa khác nhé.";
            }
        }

        return response()->json([
            'intent' => $intent,
            'reply' => $reply
        ]);
    }


    private function classifyIntent($prompt, $apiKey)
    {
        $classifyPrompt = "Phân loại nội dung sau thành [Đặt món, Tư vấn, Giá cả, Phàn nàn, Khác]: \"$prompt\"";
        return $this->chatWithOpenAI($classifyPrompt, $apiKey);
    }

    private function getChatResponse($prompt, $apiKey)
    {
        return $this->chatWithOpenAI($prompt, $apiKey);
    }

    private function extractKeywords($prompt, $apiKey)
    {
        $extractPrompt = "Từ nội dung sau, trích ra tối đa 3 từ khóa chính để tìm kiếm món ăn: \"$prompt\"";
        $response = $this->chatWithOpenAI($extractPrompt, $apiKey);
        return array_map('trim', explode(',', $response));
    }

    private function chatWithOpenAI($content, $apiKey)
    {
        $res = Http::withToken($apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [['role' => 'user', 'content' => $content]],
            ]);

        return $res['choices'][0]['message']['content'] ?? 'Không hiểu yêu cầu.';
    }
    public function index()
    {
       return view('Client.page.Chat.chat') ;// Đường dẫn đến view chat.php
    }
    //gioa diện dành cho khách hàng
    public function chatWithRestaurant($restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);

        $chatKey = "chat_messages_$restaurant_id";
        $messages = session()->get($chatKey, []);  // Lấy tất cả tin nhắn

        return view('Client.page.Chat.chat', compact('restaurant', 'messages'));
    }


    // giao diện dành cho nhà hàng
    public function chatAsRestaurant()
    {
        $user = Auth::guard('web')->user();

        $restaurant = Restaurant::where('email', $user->email)->first();

        if ($restaurant) {
            $restaurantId = $restaurant->id;

            // Lấy tin nhắn từ session
            $chatKey = "chat_messages_$restaurantId";
            $messages = session()->get($chatKey, []);  // Lấy tất cả tin nhắn

            return view('Client.page.Chat.restaurant', compact('restaurantId', 'messages'));
        }

        return redirect()->route('home')->with('error', 'Không tìm thấy nhà hàng!');
    }




    public function send(Request $request)
    {
        $message = $request->input('message');
        $sender = $request->input('sender'); // 'customer' hoặc 'restaurant'
        $restaurantId = $request->input('restaurant_id');

        // Dữ liệu tin nhắn mới
        $messageData = [
            'sender' => $sender,
            'message' => $message,
            'restaurant_id' => $restaurantId,
            'time' => now()->toDateTimeString(),
        ];

        // Lưu tin nhắn vào session
        $chatKey = "chat_messages_$restaurantId";
        $messages = session()->get($chatKey, []);
        $messages[] = $messageData;
        session()->put($chatKey, $messages);

        // Phát broadcast sự kiện khi có tin nhắn mới
        if ($sender === 'customer') {
            broadcast(new CustomerMessage($restaurantId, $message));
        } else if ($sender === 'restaurant') {
            broadcast(new RestaurantMessage($restaurantId, $message));
        }

        return response()->json(['status' => 'ok']);
    }
}
