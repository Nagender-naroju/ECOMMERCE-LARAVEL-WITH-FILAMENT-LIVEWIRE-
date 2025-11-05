<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_amount',
        'total_amount'
    ];

    public function orders(){
        return $this->belongsTo(Orders::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
