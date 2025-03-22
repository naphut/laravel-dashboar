<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    public function run()
    {
        PaymentType::create(['Payment_Type_Description' => 'Credit Card']);
        PaymentType::create(['Payment_Type_Description' => 'Cash']);
    }
}