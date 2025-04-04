<?php

namespace App\Http\Controllers\client\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // // Validate dữ liệu
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'phone' => 'required|string|max:20',
        //     'address' => 'required|string|max:500',
        //     'payment_method' => 'required|string',
        //     'products' => 'required|array',
        // ]);

        // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
        DB::beginTransaction(); 

        try {
            // Xử lý voucher
            $voucherId = null;
            $discountAmount = $request->discount_amount ?? 0;
            $shippingFee = $request->shipping_fee ?? 30000;
            $subtotal = $request->subtotal ?? 0;
            $totalPrice = $request->total_price ?? ($subtotal + $shippingFee);

            // dd($request->voucher_id);
            if ($request->voucher_id && $request->voucher_id != 0) {
                $voucher = Voucher::find($request->voucher_id);
                if ($voucher) {
                    $voucherId = $voucher->id;
                    if ($voucher->limit > 0) {
                        $voucher->decrement('limit');
                    }
                }
            }
            
            $vouchers = Voucher::find($request->voucher_id);

            if (!$voucher || !$voucher->is_active) {
                return response()->json(['error' => 'Voucher không hợp lệ hoặc đã hết hạn']);
            }

            $discountAmount = min($voucher->max_discount_value, $totalPrice);
            $totalPrice -= $discountAmount;  //

            $order = Order::create([
                'code' => 'DH' . time() . rand(100, 999),
                'user_id' => Auth::id(),
                'coupon_id' => $voucherId,
                'total_price' => $totalPrice,
                'shipping_fee' => $shippingFee,
                'discount_amount' => $discountAmount,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'order_status' => 'processing',
                'note' => $request->note,
                'address' => $request->address,
            ]);

            foreach ($request->products as $productId => $productData) {
                $product = Product::find($productData['id']);

                if (!$product) {
                    throw new \Exception("Sản phẩm ID $productId không tồn tại");
                }

                if ($product->quantity < $productData['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} không đủ số lượng tồn kho");
                }

                $product->decrement('quantity', $productData['quantity']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['id'],
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                    'total_price' => $productData['quantity'] * $productData['price'],
                ]);
            }

            Cart::where('id_user', Auth::id())->delete();

            DB::commit();

            return redirect()->route('order.success', ['id' => $order->id])
            ->with('success', 'Đặt hàng thành công!');


        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('error', 'Đặt hàng thất bại: ' . $e->getMessage());
        }
    }
    public function success($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        
        return view('client.pages.bill', compact('order'));
    }

}