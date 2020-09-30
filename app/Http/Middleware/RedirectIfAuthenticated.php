<?php

namespace App\Http\Middleware;

use App\Models\Entities\Core\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() ) {
            if(Auth::guard($guard)->user()->role_id == Role::ADMIN_ID){
            return redirect(RouteServiceProvider::HOME);}
            else{
                return redirect(RouteServiceProvider::PROFILE);
            }

        }

        return $next($request);
    }
}
