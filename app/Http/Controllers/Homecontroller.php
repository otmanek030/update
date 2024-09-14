<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    public function admin_indx()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();

        // Calculate Total Sales by Category
        $salesData = Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->select('products.type', DB::raw('SUM(order_products.price * order_products.quantity) as total'))
            ->groupBy('products.type')
            ->pluck('total', 'products.type');

        // Calculate Orders by Day
        $ordersByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->pluck('count', 'date');

        // Calculate Total Sales
    $totalSales = Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
    ->sum(DB::raw('order_products.price * order_products.quantity'));

// Calculate Total Profit (Modify logic as needed)
$totalProfit = $totalSales;

// Calculate Total Return (Modify logic as needed)
$totalReturn = 0;

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers', 'salesData', 'ordersByDay','totalSales', 'totalProfit', 'totalReturn'));
    }

    public function user_indx()
    {
        return view('user.dashboardU');
    }

    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();

        // Calculate Total Sales
        $totalSales = Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->sum(DB::raw('order_products.price * order_products.quantity'));

        // Calculate Total Profit
        $totalProfit = $totalSales; // Modify if profit is calculated differently

        // Calculate Total Return
        $totalReturn = 0; // Set this based on your specific logic for returns

        // Calculate Orders by Day
        $ordersByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->date => $item->count];
            });

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers', 'totalSales', 'totalProfit', 'totalReturn', 'ordersByDay'));
    }
}
