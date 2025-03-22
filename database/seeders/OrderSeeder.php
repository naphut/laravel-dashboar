<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'Product_ID' => 1,
            'Customer_Type_ID' => 1,
            'Payment_Type_ID' => 1,
            'Order_Quantity' => 2,
            'Order_Date_Time' => '2025-03-21 10:00:00',
            'Order_Status' => 'Pending',
        ]);
        Order::create([
            'Product_ID' => 2,
            'Customer_Type_ID' => 2,
            'Payment_Type_ID' => 2,
            'Order_Quantity' => 1,
            'Order_Date_Time' => '2025-03-21 12:00:00',
            'Order_Status' => 'Shipped',
        ]);
    }
}