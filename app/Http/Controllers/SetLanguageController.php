<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetLanguageController extends Controller
{
    const LANGE = [
        'DE',
        'UK'
    ];

    CONST KEY_LANGUAGE = "L_Language";

    public function setLanguage(Request $request)
    {
        if (Cookie::get(self::KEY_LANGUAGE) === 'DE') {
            Cookie::queue(self::KEY_LANGUAGE, 'UK', 43200);
        } else {
            Cookie::queue(self::KEY_LANGUAGE, 'DE', 43200);
        }
        return back();
    }
}
