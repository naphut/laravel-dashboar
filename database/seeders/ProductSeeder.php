<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'product_name' => 'Sample Product',
            'product_price' => 29.99,
            'product_quantity_stock' => 100,
            'product_status' => 'active',
            'product_description' => 'A sample product for testing.',
        ]);
    }
}