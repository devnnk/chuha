<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Item extends Authenticatable
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'code',
        'sku',
        'amount',
        'price',
        'title',
        'content',
        'info',
        'recommendation',
        'images',
        'desc',
        'product_id'
    ];

    private static function codeProduct($name)
    {
        $code = Str::lower(Str::slug($name));
        $product = Item::wherecode($code)->first();
        return $product ? self::codeStory(strtolower(Str::slug($code) . "-" . Str::random(4))) : $code;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
            $query->code = self::codeProduct($query->name);
        });

        // auto-sets values on creation
//        static::creating(function ($query) {
//            $time = time();
//            $query->code_normal = Str::upper($time . '_' . Str::random(3) . '-' . Str::random(3));
//            $query->timestamp_created = $time;
//        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
