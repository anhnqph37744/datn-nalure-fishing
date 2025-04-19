<?php

namespace App\Http\Controllers\admin;

use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $topProducts = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.order_status', '!=', 'canceled')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('order_items.product_id', 'products.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        $year = date('Y');
        $profitRate = 0.4;

        $orders = Order::select(
            DB::raw("MONTH(created_at) as month"),
            DB::raw("SUM(total_price) as total_revenue"),
            DB::raw("SUM(total_price) * $profitRate as profit")
        )
            ->whereYear('created_at', $year)
            ->where('order_status', 'delivered')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $data1 = [];
        $data2 = [];
        $totalRevenue = 0;
        $totalProfit = 0;

        for ($i = 1; $i <= 12; $i++) {
            $monthRevenue = $orders->firstWhere('month', $i)->total_revenue ?? 0;
            $monthProfit = $orders->firstWhere('month', $i)->profit ?? 0;

            $data1[] = [$i, round($monthRevenue)];
            $data2[] = [$i, round($monthProfit)];

            $totalRevenue += $monthRevenue;
            $totalProfit += $monthProfit;
        }
        $sold = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.order_status', '!=', 'cancelled')
            ->select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as sold_qty'))
            ->groupBy('products.id', 'products.name');

        $canceled = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.order_status', '=', 'cancelled')
            ->select('order_items.product_id', DB::raw('SUM(order_items.quantity) as canceled_qty'))
            ->groupBy('order_items.product_id');

        $cancelRates = DB::table(DB::raw("({$sold->toSql()}) as sold"))
            ->mergeBindings($sold)
            ->leftJoinSub($canceled, 'cancelled', 'sold.id', '=', 'cancelled.product_id')
            ->select(
                'sold.name',
                DB::raw('ROUND(COALESCE(cancelled.canceled_qty, 0) / sold.sold_qty * 100, 2) as cancel_rate')
            )
            ->get();

        $lowStock = Product::where('quantity', '<=', DB::raw('quantity_warning'))->get();
        $slowMoving = Product::where('quantity', '>', 0)
            ->orderBy('updated_at', 'asc')
            ->take(5)
            ->get();
        $latestOrders = Order::with('orderItems.product', 'user', 'address')->where('order_status', 'pending')->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $orderStatusData = Order::selectRaw('order_status, COUNT(*) as total')
            ->groupBy('order_status')
            ->pluck('total', 'order_status')
            ->toArray();

        $chart2Labels = $cancelRates->pluck('name');
        $chart2Data = $cancelRates->pluck('cancel_rate');
        $annualRevenue = number_format($totalRevenue, 0);
        $halfYearProfit = number_format($totalProfit / 2, 0);
        $totalRevenueFormatted = number_format($totalRevenue, 0);
        $chart1Labels = $topProducts->pluck('name');
        $chart1Data = $topProducts->pluck('total_sold');
        return view('admin.pages.dashboard', compact('topProducts', 'chart1Labels', 'chart1Data', 'data1', 'data2', 'totalRevenueFormatted', 'annualRevenue', 'halfYearProfit', 'chart2Labels', 'chart2Data', 'lowStock', 'slowMoving', 'latestOrders','orderStatusData'));
    }
    public function getRevenue()
    {

        $startDate = $_GET['start_date'] ?? null;
        $endDate = $_GET['end_date'] ?? null;
        $totalRevenue = Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('order_status', 'delivered')  // You can filter by payment status if needed
            ->sum('total_price');

        $formattedRevenue = number_format($totalRevenue, 0);

        $orderCount = Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('order_status', 'delivered')
            ->count();

        return response()->json([
            'totalRevenue' => $formattedRevenue,
            'orderCount' => $orderCount,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

}
