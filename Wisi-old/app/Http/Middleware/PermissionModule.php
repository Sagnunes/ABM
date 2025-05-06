<?php

namespace App\Http\Middleware;

use App\Acessos;
use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class PermissionModule
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
        $user = Auth::user();
        $acesso = Acessos::where('user_id',$user->id)->get();
        if ($acesso->contains('modulo_id',$modulo)) {
            return $next($request);
        }
        else{
            Session::flash('error','Não tem acesso a esta área.');
            return redirect()->back();
        }
    }
}
