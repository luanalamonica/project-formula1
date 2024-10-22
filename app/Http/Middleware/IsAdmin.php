<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // Verifica se o usuário está autenticado e é admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request); // Permite a requisição continuar
        }

        return redirect('/'); // Redireciona se não for admin
    }
}
