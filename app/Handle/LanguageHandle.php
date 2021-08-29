<?php

namespace App\Handle;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class LanguageHandle
{
    const KEY_LANGUAGE = "L_Language";

    const LANGUAGE = [
        'DE',
        'UK'
    ];

    public static function ____($str)
    {
        $language = self::getCurrentLanguage();
        if ($language !== 'UK') {
            $key_cache = "l_language_$language";
            $data = Cache::get($key_cache);
            if (!$data) {
                $data = Cache::remember("l_language_$language", 300, function () use ($language) {
                    return Language::where('type', $language)->pluck('str_from', 'code');
                });
            }

            return $data[md5($str)] ?? $str;
        }
        return $str;
    }

    public static function getCurrentLanguage()
    {
        $language = Cookie::get(LanguageHandle::KEY_LANGUAGE);
        if (in_array($language, self::LANGUAGE)) {
            return Cookie::get(LanguageHandle::KEY_LANGUAGE);
        }
        return "UK";
    }
}
