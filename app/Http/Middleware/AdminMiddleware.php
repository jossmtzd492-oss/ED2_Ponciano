<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Verificar la sesion activa
        if(!Auth::check()){
            return redirect()->route('registro')
            ->with('error', 'se debe registrar e iniciar sesión');
        }

        //Verificar que la sesión sea de un administrador
        //user saca las credenciales de la seion activa, obtiene todos ls datos de la bd
        if(!Auth::user()->is_Admin){
            return redirect()->route('libros.index')
            ->with('error', 'No cuentas con permisos de administrador');
        }
        return $next($request);
    }


}
