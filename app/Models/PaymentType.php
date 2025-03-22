<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $primaryKey = 'Payment_Type_ID';
    protected $fillable = ['Payment_Type_Description'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'Payment_Type_ID', 'Payment_Type_ID');
    }
}