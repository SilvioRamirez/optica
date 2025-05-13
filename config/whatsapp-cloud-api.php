<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WhatsApp Cloud API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the WhatsApp Cloud API settings.
    |
    */

    'curl' => [
        'verify' => env('CURL_SSL_VERIFY', true),
        'certificate_path' => env('CURL_CA_CERT_PATH', null),
    ],
]; 