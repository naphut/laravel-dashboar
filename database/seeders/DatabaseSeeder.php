<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\CustomerType;
use App\Models\PaymentType;
use App\Models\Order;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Products
        Product::create(['Product_ID' => 1, 'Product_Name' => 'Laptop', 'Product_Price' => 999.99, 'Product_Quantity_Stock' => 50, 'Product_Status' => 'Active']);
        Product::create(['Product_ID' => 2, 'Product_Name' => 'Mouse', 'Product_Price' => 29.99, 'Product_Quantity_Stock' => 100, 'Product_Status' => 'Active']);

        // Customer Types
        CustomerType::create(['Customer_Type_ID' => 1, 'Customer_Type_Description' => 'Regular']);
        CustomerType::create(['Customer_Type_ID' => 2, 'Customer_Type_Description' => 'Premium']);

        // Payment Types
        PaymentType::create(['Payment_Type_ID' => 1, 'Payment_Type_Description' => 'Credit Card']);
        PaymentType::create(['Payment_Type_ID' => 2, 'Payment_Type_Description' => 'Cash']);

        // Orders
        Order::create([
            'Product_ID' => 1,
            'Customer_Type_ID' => 1,
            'Payment_Type_ID' => 1,
            'Order_Quantity' => 2,
            'Order_Status' => 'Delivered',
            'created_at' => Carbon::yesterday(),
        ]);
        Order::create([
            'Product_ID' => 2,
            'Customer_Type_ID' => 2,
            'Payment_Type_ID' => 2,
            'Order_Quantity' => 5,
            'Order_Status' => 'Pending',
            'created_at' => Carbon::today(),
        ]);
        Order::create([
            'Product_ID' => 1,
            'Customer_Type_ID' => 1,
            'Payment_Type_ID' => 1,
            'Order_Quantity' => 1,
            'Order_Status' => 'Shipped',
            'created_at' => Carbon::today(),
        ]);
    }
}