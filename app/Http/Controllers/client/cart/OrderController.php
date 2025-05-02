<?php

namespace App\Http\Controllers\client\cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VNPay\VNPayController;
use App\Models\Address;
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
    protected $vnpay;
    public function __construct(VNPayController $vnpay)
    {
        $this->vnpay = $vnpay;
    }
    public function store(Request $request)
    {
        try {
            $address = Address::where('user_id', Auth::id())->where('is_default',1)->first();
            if (!$address) {
                return back()->with('error', 'Vui lòng thêm địa chỉ giao hàng hoặc chọn địa chỉ trước khi đặt hàng');
            }
            if ($request->payment_method === "vnpay") { 
                $order_id = $this->placeOrder($request, 2,$address->id);
                if ($order_id != null) {
                    return $this->vnpay->VNpay_Payment($request->total_price, 'en', $request->ip(), $order_id);
                }
            } else {
                $order_id = $this->placeOrder($request, 1,$address->id);
                return redirect()->route('order.success', ['id' => $order_id]);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi đặt hàng: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        $cart = Cart::where('id_user', Auth::id())->get();
        $total = $order->orderItems->sum('total_price');


        return view('client.pages.bill', compact('order', 'cart','total'));
    }
    private function placeOrder($request, $type,$address_id)
    {
        DB::beginTransaction();

        try {
            $voucherId = null;
            $discountAmount = 0;
            $shippingFee = $request->shipping_fee ?? 30000;
            $subtotal = $request->subtotal ?? 0;
            $totalPrice = $subtotal + $shippingFee;
           
            if ($request->voucher_id && $request->voucher_id != 0) {
                $voucher = Voucher::find($request->voucher_id);
                if ($voucher && $voucher->is_active && $voucher->limit > 0) {
                    $voucherId = $voucher->id;
                    $discountAmount = min($voucher->max_discount_value, $totalPrice);
                    $voucher->decrement('limit');
                    $totalPrice -= $discountAmount;
                } else {
                    return response()->json(['error' => 'Voucher không hợp lệ hoặc đã hết hạn']);
                }
            }

            $order = Order::create([
                'code' => 'DH' . time() . rand(100, 999),
                'user_id' => Auth::id(),
                'coupon_id' => $voucherId,
                'total_price' => $totalPrice,
                'shipping_fee' => $shippingFee,
                'discount_amount' => $discountAmount,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'note' => "Null",
                'address_id' => $address_id,
            ]);


            foreach ($request->products as $productId => $productData) {
                $product = Product::find($productData['id']);

                if (!$product) {
                    throw new \Exception("Sản phẩm ID {$productData['id']} không tồn tại");
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
                    'variant_id' => $productData['variant_id'],
                    'total_price' => $productData['quantity'] * $productData['price'],
                ]);
            }

            Cart::where('id_user', Auth::id())->delete();

            DB::commit();

            return $order->id;
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Đặt hàng thất bại: ' . $e->getMessage());
        }
    }
}
