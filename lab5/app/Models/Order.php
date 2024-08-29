<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_data',
        'shipping_fee',
        'address',
        'province',
        'district',
        'ward',
        'street',
        'total',
        'payment_method'
    ];

    // protected $casts = [
    //     'cart_data' => 'array'
    // ];
}
