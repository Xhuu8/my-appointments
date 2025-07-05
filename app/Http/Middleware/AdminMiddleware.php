<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'admin') {
            return $next($request);
        } else {
            // Redirigir a una vista de error o devolver una respuesta HTTP 403
            return redirect('/no-autorizado')->with('error', 'No tienes permisos para acceder a esta página.');
            //return response('Unauthorized.', 403);
        }
    }
}