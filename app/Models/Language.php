<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Language extends Authenticatable
{
    protected $table = 'languages';

    protected $fillable = [
        'code',
        'str_from',
        'str_to',
        'type'
    ];
}
