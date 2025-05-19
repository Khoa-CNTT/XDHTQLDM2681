<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function submitReview(Request $request)
    {
        // // Kiểm tra dữ liệu gửi lên
        // $request->validate([
        //     'order_id' => 'required|integer|exists:orders,id',  // Kiểm tra order_id phải là số nguyên và tồn tại trong bảng orders
        //     'rating' => 'required|integer|between:1,5',  // Kiểm tra rating phải từ 1 đến 5
        //     'comment' => 'nullable|string',  // Kiểm tra comment là chuỗi hoặc null
        // ]);
        //dd($request->all());

        $comment = $request->has('comment') ? $request->comment : null;

        $rating = Rating::create([
            'order_id' => $request->order_id,
            'rating' => $request->rating,
            'comment' => $comment,
        ]);


        return response()->json(['message' => 'Đánh giá của bạn đã được gửi.'], 200);
    }
}
