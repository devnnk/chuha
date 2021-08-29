<?php

namespace App\Http\Controllers;

use App\Handle\LanguageHandle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetLanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        if (Cookie::get(LanguageHandle::KEY_LANGUAGE) === 'DE') {
            Cookie::queue(LanguageHandle::KEY_LANGUAGE, 'UK', 43200);
        } else {
            Cookie::queue(LanguageHandle::KEY_LANGUAGE, 'DE', 43200);
        }
        return back();
    }
}
