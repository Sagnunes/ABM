<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class CreatePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$modulo)
    {
        $acesso = Auth::user()->acessos;
        if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', 3)->first())
            return $next($request);
        if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', 3)->first())
            return $next($request);
        Session::flash('error','Não tem acesso a esta área.');
        return redirect()->back();
    }
}
