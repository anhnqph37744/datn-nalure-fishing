<?php

namespace App\Http\Controllers\client\checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $user_login = Auth::user();
        $profile = Profile::where('user_id', Auth::id())->first();
        $cartItems = Cart::getItems();
        $cart = Cart::where('id_user', Auth::id())->get();
        $totalPrice = $cartItems->sum(function($item) {
            return $item->total_price;
        });

    return view('client.pages.checkout', compact('cartItems', 'totalPrice', 'cart', 'profile', 'user_login'));
    }

    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();

            // Create order
            $order = Order::create([
                'code' => 'ORD-' . strtoupper(uniqid()),
                'user_id' => Auth::id(),
                'address_id' => $request->address_id,
                'coupon_id' => $request->coupon_id,
                'shipping_fee' => $request->shipping_fee ?? 30000,
                'discount_amount' => $request->discount_amount ?? 0,
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'note' => $request->note
            ]);


            // Get cart items
            $cartItems = Cart::where('id_user', Auth::id())->get();

            // Create order items from cart
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_price' => $item->total_price
                ]);
            }

            // Clear cart after order is created
            Cart::where('id_user', Auth::id())->delete();

            DB::commit();

            return redirect()->route('checkout.success', ['order' => $order->id])
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('checkout.success', compact('order'));
    }
}
