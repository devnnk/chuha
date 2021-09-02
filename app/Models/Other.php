<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Other extends Authenticatable
{
    protected $table = 'others';

    protected $fillable = [
        'content',
        'status',
        'type',
        'position'
    ];
}
