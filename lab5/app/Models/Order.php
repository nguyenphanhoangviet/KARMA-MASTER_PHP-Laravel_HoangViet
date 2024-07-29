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
        'total'  // Thêm cột total vào đây
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

