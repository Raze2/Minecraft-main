<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (request('change_language')) {
            session()->put('language', request('change_language'));
            $language = request('change_language');
        } elseif (session('language')) {
            $language = session('language');
        } else {
            $language = 'en';
        }

        if (isset($language)) {
            app()->setLocale($language);
            // Carbon::setLocale($language);
            // if($language = 'ar')
            //     setlocale(LC_ALL,'ar_SA.UTF-8');
        }

        return $next($request);
    }
}
