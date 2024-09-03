<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id', 
        'product_name', 
        'quantity', 
        'price',
        'size',
        'image'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define the relationship to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

