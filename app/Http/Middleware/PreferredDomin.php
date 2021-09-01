<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PreferredDomin
{
    public function handle($request, Closure $next)
    {
        if (Str::startsWith($request->header('host'), 'www.')) {
            $host = str_replace('www.', '', $request->header('host'));
            $request->headers->set('host', $host);

            return Redirect::to($request->fullUrl(), 301);
        }

        return $next($request);
    }
}
