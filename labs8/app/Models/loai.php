<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class loai extends Model {

use HasFactory;

protected $table = 'loai';

public $primaryKey = 'id';

protected $fillable = ['ten_loai', 'thu_tu', 'an_hien'];

}