<?php

namespace App\Http\Controllers\Admin\order;

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
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.pages.order.show', compact('order'));
    }


    private $statusOrder = [
        'pending' => 0,
        'processing' => 1,
        'shipping' => 2,
        'completed' => 3,
        'cancelled' => 4
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
            $currentStatus = $order->order_status;

            if (!$this->isValidStatusTransition($currentStatus, $status) && $status !== 'cancelled') {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể chuyển về trạng thái trước đó'
                ]);
            }

            $order->order_status = $status;
            $order->save();
            
            return response()->json(['success' => true, 'data' => $order]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
