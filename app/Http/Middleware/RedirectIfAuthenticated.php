<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
              
                if (Auth::guard($guard)->user()->hasRole('instructor'))
                 return redirect(route('inst'));
                 else if (Auth::guard($guard)->user()->hasRole('college')) 
                return redirect(route('test'));
                else if (Auth::guard($guard)->user()->hasRole('Admin')) 
                return redirect(route('AdminDashboard'));
                  else if (Auth::guard($guard)->user()->hasRole('student'))
                return redirect(route('studentDashboard'));
            }
        }

        return $next($request);
    }


 
       
      
 
    
}
