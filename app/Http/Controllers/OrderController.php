<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id', // Fixed: Use 'id' instead of 'Product_ID'
            'customer_type_id' => 'required|exists:customer_types,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'order_quantity' => 'required|integer|min:1',
            'order_date_time' => 'required|date',
            'order_status' => 'required|string',
        ]);

        // Create the order
        $order = Order::create([
            'product_id' => $validated['product_id'],
            'customer_type_id' => $validated['customer_type_id'],
            'payment_type_id' => $validated['payment_type_id'],
            'order_quantity' => $validated['order_quantity'],
            'order_date_time' => $validated['order_date_time'],
            'order_status' => $validated['order_status'],
        ]);

        return redirect()->route('orders.index')->with('success', 'Order added successfully');
    }
}