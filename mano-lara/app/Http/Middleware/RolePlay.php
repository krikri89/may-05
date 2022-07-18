<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolePlay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = $request->user()?->role ?? 0; //jeigu isvis nera prisijunges, user gauna 0 role. 
        if ($role == 'admin') { // jeigu reikaliaujama role yra admin
            if ($userRole < 10) { // ir jeigu user role yra mazesne uz 10, gauna abort
                abort(403);
            }
        }
        if ($role == 'user') { // jeigu role yra user
            if ($userRole < 1) { // abort jeigu maziau uz 1, taigi jis turi 0
                abort(403);
            }
        }

        return $next($request); // pateikti visa turini jeigu praeina visus validations
    }
}
