<?php

namespace App\Http\Middleware;

use Closure;

class CustomMiddleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Aquí puedes agregar la lógica que deseas que ejecute el middleware
        // Por ejemplo, puedes comprobar si el usuario está autenticado o si tiene ciertos permisos

        // Ejemplo de lógica: Redirigir si el usuario no está autenticado
        if (!$request->user()) {
            return redirect('/login'); // Cambia esto según tu lógica
        }

        return $next($request); // Continúa con la solicitud
    }
}
