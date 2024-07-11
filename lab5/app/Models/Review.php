<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'review',
        'star',
        '_token', // Thêm dòng này
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
