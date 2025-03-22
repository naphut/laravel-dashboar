<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $todaySales = Order::whereDate('created_at', $today)
            ->with('product')
            ->get()
            ->sum(function ($order) {
                return $order->Order_Quantity * $order->product->Product_Price;
            });

        $yesterdaySales = Order::whereDate('created_at', $yesterday)
            ->with('product')
            ->get()
            ->sum(function ($order) {
                return $order->Order_Quantity * $order->product->Product_Price;
            });

        $salesTrend = $yesterdaySales > 0
            ? round((($todaySales - $yesterdaySales) / $yesterdaySales) * 100)
            : ($todaySales > 0 ? 100 : 0);
        $salesTrendText = $salesTrend >= 0 ? "+{$salesTrend}% from yesterday" : "{$salesTrend}% from yesterday";

        $totalOrders = Order::count();
        $yesterdayOrders = Order::whereDate('created_at', $yesterday)->count();
        $todayOrders = Order::whereDate('created_at', $today)->count();

        $ordersTrend = $yesterdayOrders > 0
            ? round((($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100)
            : ($todayOrders > 0 ? 100 : 0);
        $ordersTrendText = $ordersTrend >= 0 ? "+{$ordersTrend}% from yesterday" : "{$ordersTrend}% from yesterday";

        $totalProducts = Product::count();
        $newProductsToday = Product::whereDate('created_at', $today)->count();
        $productsTrendText = "+{$newProductsToday} new today";

        $lowStockProducts = Product::where('Product_Quantity_Stock', '<', 10)->count();

        $recentOrders = Order::with(['product', 'customerType', 'paymentType'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', [
            'sales' => $todaySales,
            'salesTrend' => $salesTrendText,
            'orders' => $totalOrders,
            'ordersTrend' => $ordersTrendText,
            'products' => $totalProducts,
            'productsTrend' => $productsTrendText,
            'lowStockProducts' => $lowStockProducts,
            'recentOrders' => $recentOrders,
        ]);
    }
}