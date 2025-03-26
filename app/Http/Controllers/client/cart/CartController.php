<?php

namespace App\Http\Controllers\client\cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function Cart()
    {
        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            return view('client.pages.cart', compact('cart'));
        } else {
            return redirect()->route('home')->with('error', 'Vui lòng đăng nhập để vào giỏ hàng');
        }
    }
    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->product_id;
            $variant_id = $request->variant_id;
            $quantity = $request->quantity;
            $user_id = Auth::id();
            $product = Product::find($product_id);
            $variant = Variant::where('id', $variant_id)
                ->where('product_id', $product_id)
                ->first();

            if (!$variant) {
                return response()->json(['message' => 'Sản phẩm hoặc biến thể không tồn tại', 'type' => 'error']);
            }

            if ($variant->quantity < $quantity) {
                return response()->json(['message' => 'Không đủ số lượng trong kho', 'type' => 'error']);
            }

            $cartItem = Cart::where('id_user', $user_id)
                ->where('id_product', $product_id)
                ->where('variant_id', $variant_id)
                ->first();

            if ($cartItem) {
                $newQuantity = $cartItem->quantity + $quantity;

                if ($newQuantity > $variant->quantity) {
                    return response()->json(['message' => 'Số lượng vượt quá số lượng tồn kho', 'type' => 'error']);
                }

                $cartItem->update([
                    'quantity' => $newQuantity,
                    'total' => $newQuantity * $variant->price
                ]);

                return response()->json(['message' => 'Cập nhật giỏ hàng thành công', 'type' => 'success']);
            } else {
                Cart::create([
                    'name' => $product->name,
                    'image' => $product->image,
                    'id_user' => $user_id,
                    'id_product' => $product_id,
                    'variant_id' => $variant_id,
                    'quantity' => $quantity,
                    'price' => $variant->price,
                    'total' => $quantity * $variant->price
                ]);

                return response()->json(['message' => 'Thêm vào giỏ hàng thành công', 'type' => 'success']);
            }
        } else {
            return response()->json(['message' => 'Vui lòng đăng nhập để thêm vào giỏ hàng', 'type' => 'error']);
        }
    }
    public function RemoveCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart')->with('success', 'Xoá thành công');
    }
}
