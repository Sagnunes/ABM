<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
class ReadPermission
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
        if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', 1)->first())
            return $next($request);
        if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', 1)->first())
            return $next($request);
        Session::flash('error','Não tem acesso a esta área.');
        return redirect()->back();
    }
}
