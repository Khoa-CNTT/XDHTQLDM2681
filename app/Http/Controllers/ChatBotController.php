<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $apiKey = config('services.openai.key');
        //dd($apiKey);
        // Phân loại intent
        $intent = $this->classifyIntent($prompt, $apiKey);

        // Gửi prompt chính
        $reply = $this->getChatResponse($prompt, $apiKey);

        // Nếu là tư vấn, tìm trong DB
        if (str_contains($intent, 'Tư vấn')) {
            $keywords = $this->extractKeywords($prompt, $apiKey);

            $foundItem = MenuItem::where(function ($q) use ($keywords, $prompt) {
                $q->whereRaw('LOWER(Title_items) LIKE ?', ['%' . strtolower($prompt) . '%'])
                    ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($prompt) . '%']);

                foreach ($keywords as $keyword) {
                    $q->orWhereRaw('LOWER(Title_items) LIKE ?', ['%' . strtolower($keyword) . '%'])
                        ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($keyword) . '%']);
                }
            })->first();


            if ($foundItem) {
                $reply = "🍽️ Món ăn: **{$foundItem->Title_items}** - {$foundItem->description}, giá: {$foundItem->price} VNĐ.";
            } else {
                $reply .= "\n\nChưa tìm thấy món phù hợp, bạn vui lòng để lại thông tin để được hỗ trợ.";
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
}
