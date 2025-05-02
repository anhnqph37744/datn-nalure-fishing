<?php

namespace App\Http\Controllers\client\cart;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function Cart()
    {
        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            $total = Cart::where('id_user', Auth::id())->sum('total');
            return view('client.pages.cart', compact('cart','total'));
        } else {
            return redirect()->route('home')->with('error', 'Vui lòng đăng nhập để vào giỏ hàng');
        }
    }
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Vui lòng đăng nhập để thêm vào giỏ hàng', 'type' => 'error']);
        }
        // return response()->json($request->all());
        $product_id = $request->product_id;
        $variant_id = $request->variant_id ?? null;
        $quantity = $request->quantity;
        $user_id = Auth::id();

        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại', 'type' => 'error']);
        }

        if ($variant_id) {
            $variant = Variant::where('id', $variant_id)
                ->where('product_id', $product_id)
                ->first();

            if (!$variant) {
                return response()->json(['message' => 'Biến thể không tồn tại', 'type' => 'error']);
            }

            if ($variant->quantity < $quantity) {
                return response()->json(['message' => 'Không đủ số lượng trong kho', 'type' => 'error']);
            }

            $price = $variant->price;
            $image = $variant->image ?? $product->image;
        } else {
            if ($product->quantity < $quantity) {
                return response()->json(['message' => 'Không đủ số lượng trong kho', 'type' => 'error']);
            }

            $price = $product->price;
            $image = $product->image;
        }

        $cartItem = Cart::where('id_user', $user_id)
            ->where('id_product', $product_id)
            ->where('variant_id', $variant_id)
            ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;

            $stockQuantity = $variant_id ? $variant->quantity : $product->quantity;

            if ($newQuantity > $stockQuantity) {
                return response()->json(['message' => 'Số lượng vượt quá số lượng tồn kho', 'type' => 'error']);
            }

            $cartItem->update([
                'quantity' => $newQuantity,
                'total' => $newQuantity * $price
            ]);

            return response()->json(['message' => 'Cập nhật giỏ hàng thành công', 'type' => 'success']);
        } else {
            Cart::create([
                'name' => $product->name,
                'image' => $image,
                'id_user' => $user_id,
                'id_product' => $product_id,
                'variant_id' => $variant_id,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $quantity * $price
            ]);

            return response()->json(['message' => 'Thêm vào giỏ hàng thành công', 'type' => 'success']);
        }
    }

    public function RemoveCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart')->with('success', 'Xoá thành công');
    }

    public function applyDiscount(Request $request)
    {
        // Lấy mã giảm giá người dùng nhập vào
        $discountCode = $request->input('discount_code');

        // Kiểm tra mã giảm giá hợp lệ
        $discount = Voucher::validateDiscount($discountCode);

        if ($discount) {
            // Mã giảm giá hợp lệ, tính toán giảm giá
            $totalAmount = $request->input('total_amount'); // Giả sử bạn có tổng số tiền

            // Giảm giá có thể là % hoặc giá trị cố định
            $discountAmount = ($discount->discount_value / 100) * $totalAmount; // Nếu giảm giá là phần trăm

            // Cập nhật tổng tiền sau khi áp dụng giảm giá
            $finalAmount = $totalAmount - $discountAmount;

            return response()->json([
                'success' => true,
                'message' => 'Mã giảm giá áp dụng thành công!',
                'final_amount' => $finalAmount,
                'discount' => $discountAmount,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn!',
            ]);
        }
    }

    public function checkOut(){
        // Lấy tất cả sản phẩm trong giỏ hàng
        $cart = Cart::all();
        
        // Lấy tất cả các voucher
        $vouchers = Voucher::where('is_active',1)->whereNotIn('id', function ($query) {
            $query->select('coupon_id')
                ->from('orders')
                ->where('user_id', Auth::id());
        })->get();
        
        // Lấy thông tin người dùng đã đăng nhập
        $user_login = Auth::user();
        $addresses = Address::where('user_id', Auth::id())->get();
        // Trả dữ liệu về view checkout
        return view('client.pages.checkout', compact('cart', 'user_login', 'vouchers','addresses'));
    }
    
    public function bill(Request $request){
        dd($request);
    }

    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->cart_id);

        $newQuantity = $request->quantity;

        if ($newQuantity < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Số lượng sản phẩm phải lớn hơn 0.'
            ]);
        }

        if ($cartItem->variant_id) {
            $variant = Variant::find($cartItem->variant_id);
            if (!$variant || $newQuantity > $variant->quantity) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Số lượng trong kho không đủ.'
                ]);
            }
        } else {
            $product = Product::find($cartItem->id_product);
            if (!$product || $newQuantity > $product->quantity) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Số lượng trong kho không đủ.'
                ]);
            }
        }

        $cartItem->quantity = $newQuantity;
        $cartItem->total = $cartItem->price * $newQuantity;
        $cartItem->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật số lượng thành công.',
            'total' => number_format($cartItem->total, 0, ',', '.'),
            'subtotal' => number_format(Cart::sum('total'), 0, ',', '.')
        ]);
    }
}
