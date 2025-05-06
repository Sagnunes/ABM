<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class AdminModule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->acessos->where('modulo_id',14)->where('nivel','>=',3)->first()) {
            return $next($request);
        }
        Session::flash('error','Não tem acesso a esta área.');
        return redirect()->back();
    }
}
