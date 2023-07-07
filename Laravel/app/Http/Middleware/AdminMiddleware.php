<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario autenticado es un administrador
        if ($request->user() && $request->user()->isAdmin()) {
            // El usuario es un administrador, permitir el acceso
            return $next($request);
        }

        if ($request->is('admin/*')){
            return redirect()->route('unauthorized');
        }

        return $next($request);
    }
}
