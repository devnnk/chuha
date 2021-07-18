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
        'desc'
    ];

    private static function codeProduct($name)
    {
        $code = Str::lower(Str::slug($name));
        $product = Product::wherecode($code)->first();
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
