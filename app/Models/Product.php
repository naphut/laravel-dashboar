<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity_stock',
        'product_status',
        'product_description',
    ];

    // A product can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}