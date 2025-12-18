<?php

namespace App\Providers;

use App\Models\Configuracion;
use Illuminate\Support\ServiceProvider;
use App\Services\WhatsAppApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        $this->app->singleton(WhatsAppApiService::class, function ($app) {
            return new WhatsAppApiService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(config('app.env') === 'production') {
            /* view()->share('configOrganizacion', $configuracion = Configuracion::find(1)); */
        }

        //Debugbar::disable(); 

    }
}
