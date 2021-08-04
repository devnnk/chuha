<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Price extends Authenticatable
{
    protected $table = 'prices';

    protected $fillable = [
        'type',
        'amount',
        'price',
        'desc',
        'option',
        'item_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
