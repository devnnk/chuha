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
        'banner',
        'position_menu',
        'position',
        'status'
    ];

    private static function codeStory($name, $id)
    {
        $code = Str::lower(Str::slug($name));
        $category = Category::wherecode($code)->first();
        return $category && $category->id !== (int)$id ? self::codeStory(strtolower(Str::slug($code) . "-" . Str::random(4)), $id) : $code;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
            $id = $query->id;
            $query->code = self::codeStory($query->name, $id);
        });

        // auto-sets values on creation
//        static::creating(function ($query) {
//            $time = time();
//            $query->code_normal = Str::upper($time . '_' . Str::random(3) . '-' . Str::random(3));
//            $query->timestamp_created = $time;
//        });
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
