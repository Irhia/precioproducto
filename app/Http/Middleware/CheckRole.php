<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        /*

        Hemos agregado una redirección estándar a la ruta “home”, pero en esta línea podrás agregar lo que desees. Por ejemplo:

        // opción 1
        abort(403, “No tienes autorización para ingresar.”);
        // Opción 2
        return redirect(‘home’);
        */

        if(!$request->user()->hasRole($role)) {
            return redirect('private.home');
        }
        return $next($request);
    }
}
