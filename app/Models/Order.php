<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'Order_ID';

    protected $fillable = [
        'Product_ID',
        'Customer_Type_ID',
        'Payment_Type_ID',
        'Order_Quantity',
        'Order_Status',
        'created_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID', 'Product_ID');
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class, 'Customer_Type_ID', 'Customer_Type_ID');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'Payment_Type_ID', 'Payment_Type_ID');
    }
}