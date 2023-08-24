<?php

namespace App\Providers;

use App\Models\Configuracion;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* view()->share('configOrganizacion', $configuracion = Configuracion::find(1)); */
    }
}
