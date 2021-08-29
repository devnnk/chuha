<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Order extends Authenticatable
{
    protected $table = 'orders';

    CONST LIST_STATUS = ['PENDING', 'SUCCESS', 'DELIVERY', 'CANCEL'];

    protected $fillable = [
        'order_id',
        'orders',
        'address',
        'email',
        'number_phone',
        'name',
        'note',
        'status',
    ];
}
