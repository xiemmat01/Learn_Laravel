<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    use HasFactory;

    protected $table = 'thanh_vien';

    protected $filltable = [
        'username',
        'password',
        'level',
    ];

    public $timestamps = false;
}
