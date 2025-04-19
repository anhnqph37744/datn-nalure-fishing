<?php

namespace App\Http\Controllers\admin\review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    // Hiển thị danh sách đánh giá
    public function index()
    {
        $reviews = ProductReview::with(['product', 'user'])->latest()->paginate(10);
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function toggle($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->is_active = !$review->is_active;
        $review->save();

        return redirect()->back()->with('success', 'Đã cập nhật trạng thái đánh giá.');
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        ProductReview::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'review' => $request->review,
            'is_active' => false, // hoặc false nếu muốn admin duyệt
        ]);

        return back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm! Chúng tôi sẽ xem xét đánh giá của bạn.');
    }
}