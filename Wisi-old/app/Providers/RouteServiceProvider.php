<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCasamentoRoutes();

        $this->mapNascimentoRoutes();

        $this->mapPassaporteRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapCasamentoRoutes(){
        Route::prefix('casamento')
            ->middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/casamento.php'));
    }
    protected function mapNascimentoRoutes(){
        Route::prefix('nascimento')
            ->middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/nascimento.php'));
    }
    protected function mapPassaporteRoutes(){
        Route::prefix('passaporte')
            ->middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/passaporte.php'));
    }
}
