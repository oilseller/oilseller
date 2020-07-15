<?php

return [

    'domain' => null,

    'path' => 'oilseller',

    'driver' => [
        'type' => 'database',
        'connection' => 'sqlite',
    ],

    'tables' => [
        'oils' => 'oils',
        'oil_apps' => 'oil_apps',
        'oil_access_logs' => 'oil_access_logs',
    ],

    'models' => [
        'oil' => OilSeller\Model\Oil::class,
        'oil_app' => OilSeller\Model\OilApp::class,
        'oil_access_log' => OilSeller\Model\OilAccessLog::class,
    ],

    'middleware' => [
        'admin' => 'web',

        'api' => 'oilseller-api',
    ],

    'sync-interval' => 60,

    'config-dir' => 'oilseller-config-dir',

    'monitor' => [
        'enable' => true,

        'report' => [
            'is_sync' => false,

            'data-medium' => [
                'driver' => 'redis',
                'redis-connection' => 'default',
            ],

            'interval' => 60,
        ],
    ],
];
