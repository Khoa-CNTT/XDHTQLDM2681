<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with(['order.user', 'order.menu_items'])->paginate(20);
        return view('Admin.page.Ratings.index', compact('ratings'));
    }

    public function approve(Rating $rating)
    {
        if ($rating->is_approved == 1) {
            return redirect()->back()->with('error', 'Đánh giá này đã được duyệt!');
        }

        $rating->is_approved = 1;
        $rating->save();

        return redirect()->back()->with('success', 'Đánh giá đã được duyệt!');
    }


    public function hide(Rating $rating)
    {
        $rating->update(['is_approved' => false]);
        return back()->with('success', 'Đã ẩn đánh giá');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return back()->with('success', 'Đã xóa đánh giá');
    }
}
