<?php

return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'basic' => [
                    'adapter' => \ZF\MvcAuth\Authentication\HttpAdapter::class,
                    'options' => [
                        'accept_schemes' => [
                            0 => 'basic',
                        ],
                        'realm' => 'api',
                        //'htpasswd' => __DIR__ . '/../users.htpasswd',
                    ],
                ],
            ],
        ],
    ],
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
];
