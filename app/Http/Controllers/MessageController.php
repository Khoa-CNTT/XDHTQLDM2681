<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'content' => $request->message,
            'restaurant_id' => $request->restaurant_id,
        ]);

        broadcast(new MessageSent($message));

        return response()->json($message);
    }
}
