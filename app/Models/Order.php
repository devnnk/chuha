<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Order extends Authenticatable
{
    protected $table = 'orders';

    CONST LIST_STATUS = ['PENDING', 'DELIVERY', 'SUCCESS', 'CANCEL'];
    CONST STATUS_CLASS = [
        'PENDING' => 'bg-yellow-600 text-white',
        'DELIVERY' => 'bg-indigo-500 text-white',
        'SUCCESS' => 'bg-green-600 text-white',
        'CANCEL' => 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:ring-gray-300 text-white'
    ];

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
