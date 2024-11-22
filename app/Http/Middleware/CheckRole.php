<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene el rol necesario
        if ($user && in_array($user->rol, $roles)) {
            return $next($request);
        }

        // Si el usuario no tiene el rol necesario, redirigirlo a una página de error o a otra ruta
        return redirect()->route('login')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
