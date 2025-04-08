<?php

namespace App\Http\Controllers\admin\review;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    // Hiển thị danh sách đánh giá
    public function index()
    {
        $reviews = ProductReview::with(['product', 'user'])->latest()->paginate(10);
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    // Xoá đánh giá
    public function destroy($id)
    {
        ProductReview::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xoá đánh giá thành công.');
    }
}