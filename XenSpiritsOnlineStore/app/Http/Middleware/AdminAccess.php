<?php

namespace App\Http\Middleware;

use App\Models\LoginStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        if(LoginStatus::$isLogged != true)
        {
            return redirect('/login');
        }
    
        return $next($request);
       
    }
}
