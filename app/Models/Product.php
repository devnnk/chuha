<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Product extends Authenticatable
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'position',
        'status',
        'banner',
        'sku',
        'desc'
    ];

    private static function codeProduct($name, $id)
    {
        $code = Str::lower(Str::slug($name));
        $product = Product::wherecode($code)->first();
        return $product && $product->id != $id ? self::codeProduct(strtolower(Str::slug($code) . "-" . Str::random(4)), $id) : $code;
    }

    private static function skuProduct($sku, $id)
    {
        $sku = Str::upper(Str::slug($sku));
        $product = Product::wheresku($sku)->first();
        return $product && $product->id != (int)$id ? self::skuProduct(Str::upper(Str::slug($sku) . Str::random(2)), $id) : $sku;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
            $id = $query->id;
            $query->code = self::codeProduct($query->name, $id);
            $query->sku = self::skuProduct($query->sku, $id);
        });

        // auto-sets values on creation
//        static::creating(function ($query) {
//            $time = time();
//            $query->code_normal = Str::upper($time . '_' . Str::random(3) . '-' . Str::random(3));
//            $query->timestamp_created = $time;
//        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
