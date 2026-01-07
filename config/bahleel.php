<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Bahleel Configuration
    |--------------------------------------------------------------------------
    |
    | Configure Bahleel framework settings for web scraping operations.
    |
    */

    'spiders_path' => base_path('spiders'),
    'middlewares_path' => base_path('middlewares'),
    'processors_path' => base_path('processors'),
    'exporters_path' => base_path('exporters'),
    'storage_path' => storage_path('app'),
    'exports_path' => storage_path('exports'),

    /*
    |--------------------------------------------------------------------------
    | Storage Settings
    |--------------------------------------------------------------------------
    */

    'auto_save' => env('BAHLEEL_AUTO_SAVE', true),
    'duplicate_filter' => env('BAHLEEL_DUPLICATE_FILTER', true),

    /*
    |--------------------------------------------------------------------------
    | Default Spider Settings
    |--------------------------------------------------------------------------
    */

    'concurrency' => env('BAHLEEL_CONCURRENCY', 2),
    'request_delay' => env('BAHLEEL_REQUEST_DELAY', 1),

    /*
    |--------------------------------------------------------------------------
    | Proxy Settings
    |--------------------------------------------------------------------------
    */

    'proxy' => [
        'enabled' => env('PROXY_ENABLED', false),
        'url' => env('PROXY_URL', null),
        'hosts' => env('PROXY_HOSTS', '*'),
    ],

    /*
    |--------------------------------------------------------------------------
    | JavaScript Execution
    |--------------------------------------------------------------------------
    */

    'javascript' => [
        'enabled' => env('JS_ENABLED', false),
        'chrome_path' => env('CHROME_PATH', null),
        'node_path' => env('NODE_PATH', null),
    ],
];
