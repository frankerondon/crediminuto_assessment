<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // Development code:
        return $next($request);

        // Production code:
        /*
        if (!$request->user() || !$request->user()->role || $request->user()->role->name !== $role) {
            abort(403, 'No tiene permisos para acceder a esta sección.');
        }
        return $next($request);
        */
    }
}