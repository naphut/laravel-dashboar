<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $primaryKey = 'Customer_Type_ID';
    protected $fillable = ['Customer_Type_Description'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'Customer_Type_ID', 'Customer_Type_ID');
    }
}