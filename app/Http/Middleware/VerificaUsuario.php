<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Verificar si el usuario tiene una sesión activa
        if(!Auth::check()){
            return redirect()->route('registro')->with('error', 'se deve registrar e iniciar sesión');
        }

        //NO borrar - muy importante
        return $next($request);
    }
}
