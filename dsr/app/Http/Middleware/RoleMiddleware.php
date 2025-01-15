<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        var_dump($user->IsAdmin());exit;
        
        if($user->IsAdmin()){
            return redirect()->intended('/admin/dashboard');
        }
        
        
        return $next($request);
        
        
    }
}
