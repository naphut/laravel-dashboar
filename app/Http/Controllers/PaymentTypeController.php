<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentType;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('payment-types', compact('paymentTypes'));
    }
}