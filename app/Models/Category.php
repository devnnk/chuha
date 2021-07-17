<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Category extends Authenticatable
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'code',
        'banner'
    ];

    private static function codeStory($name)
    {
        $code = Str::lower(Str::slug($name));
        $category = Category::wherecode($code)->first();
        return $category ? self::codeStory(strtolower(Str::slug($code) . "-" . Str::random(4))) : $code;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
            $query->code = self::codeStory($query->name);
        });

        // auto-sets values on creation
//        static::creating(function ($query) {
//            $time = time();
//            $query->code_normal = Str::upper($time . '_' . Str::random(3) . '-' . Str::random(3));
//            $query->timestamp_created = $time;
//        });
    }

}
