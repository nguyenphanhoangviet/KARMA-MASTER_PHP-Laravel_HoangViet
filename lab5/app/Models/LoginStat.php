<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginStat extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'login_count'];

    protected $casts = [
        'date' => 'date',
    ];
}
