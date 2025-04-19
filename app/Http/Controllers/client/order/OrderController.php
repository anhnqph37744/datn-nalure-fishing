<?php

namespace App\Http\Controllers\client\order;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class OrderController extends Controller
{
    public function index()
    {
        $cart = Cart::where('id_user', Auth::id())->get();
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->paginate(10);
        return view('client.pages.order.index', compact('orders', 'cart'));
    }

    public function show(Order $order)
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        $cart = Cart::where('id_user', Auth::id())->get();
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('client.pages.order.show', compact('order', 'cart', 'profile'));
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($order->order_status !== 'pending') {
            return response()->json(['message' => 'Không thể hủy đơn hàng này'], 400);
        }

        $order->update(['order_status' => 'canceled']);
        return response()->json(['message' => 'Đơn hàng đã được hủy thành công']);
    }
}
