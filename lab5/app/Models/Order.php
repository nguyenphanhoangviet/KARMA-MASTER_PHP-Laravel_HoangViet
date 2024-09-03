<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'phone',
        'payment_method',
        'payment_status'
    ];

    /// Define the relationship to the OrderDetail model
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Optionally cast the cart_data attribute to an array if it's stored as JSON
    protected $casts = [
        'cart_data' => 'array',
    ];
}
