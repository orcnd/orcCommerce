<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, string $role)
    {
        // no login 
        if (!Auth::check()) 
            return redirect('login');
    
        $user = Auth::user();
        // everything is free for admin
        // or role matches
        if($user->role==='admin' || $user->role===$role)
            return $next($request);
                
        // no luck
        return redirect('login');
    }
}
