<?php

namespace GestorBackend\Http\Middleware;

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
    public function handle($request, Closure $next, $rol)
    {
        if (! $request->user()->tieneRol($rol)) {
            $mensaje = "No tiene acceso";
            return response()->json(compact('mensaje'));
        }
        return $next($request);
    }
}
