<?php
return [
    'service_manager' => [
        'factories' => [
            \FirstRest\V1\Rest\Ping\PingResource::class => \FirstRest\V1\Rest\Ping\PingResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'first-rest.rest.ping' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ping[/:ping_id]',
                    'defaults' => [
                        'controller' => 'FirstRest\\V1\\Rest\\Ping\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'first-rest.rest.ping',
        ],
    ],
    'zf-rest' => [
        'FirstRest\\V1\\Rest\\Ping\\Controller' => [
            'listener' => \FirstRest\V1\Rest\Ping\PingResource::class,
            'route_name' => 'first-rest.rest.ping',
            'route_identifier_name' => 'ping_id',
            'collection_name' => 'ping',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '25',
            'page_size_param' => null,
            'entity_class' => \FirstRest\V1\Rest\Ping\PingEntity::class,
            'collection_class' => \FirstRest\V1\Rest\Ping\PingCollection::class,
            'service_name' => 'Ping',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'FirstRest\\V1\\Rest\\Ping\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'FirstRest\\V1\\Rest\\Ping\\Controller' => [
                0 => 'application/vnd.first-rest.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'FirstRest\\V1\\Rest\\Ping\\Controller' => [
                0 => 'application/vnd.first-rest.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \FirstRest\V1\Rest\Ping\PingEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'first-rest.rest.ping',
                'route_identifier_name' => 'ping_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \FirstRest\V1\Rest\Ping\PingCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'first-rest.rest.ping',
                'route_identifier_name' => 'ping_id',
                'is_collection' => true,
            ],
        ],
    ],
];
