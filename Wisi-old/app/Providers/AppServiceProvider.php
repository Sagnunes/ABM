<?php

namespace App\Providers;

use App\Acessos;
use App\Noticias;
use App\User;
use App\Aprovisionamento;
use App\Deposito;
use App\Familia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Auth;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        View::share([
            'utilizadores_por_validar'=>User::where('status','=',0),
            'novos_pedido_aprovisionamento'=> Aprovisionamento::where('estado','=',1),
            'novas_noticias'=>Noticias::where('created_at','>',Carbon::now()->startOfWeek()),
            'menu_aprovisionamento'=>Familia::orderBy('nome')->get()
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
