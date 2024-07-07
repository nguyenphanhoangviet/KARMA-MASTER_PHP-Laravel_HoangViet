<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_pham';
    public $primaryKey = 'id';
    protected $attributes = [];
    protected $dates = [];
    protected $fillable = ['ten_sp', 'gia', 'id_loai'];

}
