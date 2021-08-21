<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Banner extends Authenticatable
{
    protected $table = 'banners';

    protected $fillable = [
        'name',
        'image',
        'url',
        'position',
        'status'
    ];
}
