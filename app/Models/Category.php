<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'name_unicode'
    ];
}
