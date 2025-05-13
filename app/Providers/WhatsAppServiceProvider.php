<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class WhatsAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Http::macro('withWhatsAppConfig', function () {
            $config = config('whatsapp-cloud-api.curl');
            
            if (!$config['verify']) {
                return $this->withoutVerifying();
            }
            
            if ($config['certificate_path']) {
                return $this->withOptions([
                    'verify' => $config['certificate_path']
                ]);
            }
            
            return $this;
        });
    }
} 