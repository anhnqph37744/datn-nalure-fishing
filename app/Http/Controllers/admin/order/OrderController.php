<?php

namespace App\Http\Controllers\Admin\order;

use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.order.list', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.variant.varianAttributeValue.attribute', 'orderItems.variant.varianAttributeValue.attributeValue'])->findOrFail($id);
        $order_total = $order->orderItems->sum('total_price');
        $order->total_items_price = $order_total;
        return view('admin.pages.order.show', compact('order'));
    }

    private $statusOrder = [
        'pending' => 0,
        'processing' => 1,
        'shipping' => 2,
        'delivered' => 3,
        'cancelled' => 4
    ];

    private $statusMapping = [
        'pending' => 'pending',
        'processing' => 'processing',
        'shipping' => 'shipping',
        'completed' => 'delivered',
        'cancelled' => 'canceled'
    ];

    private function isValidStatusTransition($currentStatus, $newStatus)
    {
        return $this->statusOrder[$newStatus] > $this->statusOrder[$currentStatus];
    }

    public function update()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];

        try {
            $order = Order::findOrFail($id);
        
            $order->order_status = $status;
            // Cập nhật trạng thái hiển thị cho user
            // $order->status = $this->statusMapping[$status];
            $order->save();
            broadcast(new OrderStatusUpdated($order))->toOthers();

            
            return response()->json(['success' => true, 'data' => $order]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
