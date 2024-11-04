<?php

// app/Http/Middleware/SetLanguage.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        $locale = Session::get('locale', 'es'); // 'es' como idioma predeterminado
        App::setLocale($locale);

        return $next($request);
    }
}
