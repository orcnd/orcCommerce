<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
class SetLocale
{
    /**
     * Set locale handle
     * 
     * @param \Illuminate\Http\Request $request req
     * @param \Closure                 $next    closure
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->get('locale', session('locale', config('app.locale')));
        App::setLocale($locale);

        // Optionally, store the locale in the session
        session(['locale' => $locale]);

        return $next($request);
    }
}
