<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerType;

class CustomerTypeSeeder extends Seeder
{
    public function run()
    {
        CustomerType::create(['Customer_Type_Description' => 'Regular']);
        CustomerType::create(['Customer_Type_Description' => 'Premium']);
    }
}