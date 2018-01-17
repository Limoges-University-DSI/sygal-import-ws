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
            'first-rest.rest.doctrine.doctorant' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/doctorant[/:doctorant_id]',
                    'defaults' => [
                        'controller' => 'FirstRest\\V1\\Rest\\Doctorant\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'first-rest.rest.ping',
            1 => 'first-rest.rest.doctrine.doctorant',
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
        'FirstRest\\V1\\Rest\\Doctorant\\Controller' => [
            'listener' => \FirstRest\V1\Rest\Doctorant\DoctorantResource::class,
            'route_name' => 'first-rest.rest.doctrine.doctorant',
            'route_identifier_name' => 'doctorant_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'doctorant',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '25',
            'page_size_param' => 'p',
            'entity_class' => \FirstRest\V1\Entity\Db\Doctorant::class,
            'collection_class' => \FirstRest\V1\Rest\Doctorant\DoctorantCollection::class,
            'service_name' => 'Doctorant',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'FirstRest\\V1\\Rest\\Ping\\Controller' => 'HalJson',
            'FirstRest\\V1\\Rest\\Doctorant\\Controller' => 'HalJson',
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
        'accept-whitelist' => [
            'FirstRest\\V1\\Rest\\Doctorant\\Controller' => [
                0 => 'application/vnd.first-rest.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content-type-whitelist' => [
            'FirstRest\\V1\\Rest\\Doctorant\\Controller' => [
                0 => 'application/json',
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
            \FirstRest\V1\Entity\Db\Doctorant::class => [
                'route_identifier_name' => 'doctorant_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'first-rest.rest.doctrine.doctorant',
                'hydrator' => 'FirstRest\\V1\\Rest\\Doctorant\\DoctorantHydrator',
            ],
            \FirstRest\V1\Rest\Doctorant\DoctorantCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'first-rest.rest.doctrine.doctorant',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \FirstRest\V1\Rest\Doctorant\DoctorantResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'FirstRest\\V1\\Rest\\Doctorant\\DoctorantHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'FirstRest\\V1\\Rest\\Doctorant\\DoctorantHydrator' => [
            'entity_class' => \FirstRest\V1\Entity\Db\Doctorant::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'FirstRest\\V1\\Rest\\Doctorant\\Controller' => [
            'input_filter' => 'FirstRest\\V1\\Rest\\Doctorant\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'FirstRest\\V1\\Rest\\Doctorant\\Validator' => [
            0 => [
                'name' => 'civilite',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 5,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'dateNaissance',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'nationalite',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
            ],
            3 => [
                'name' => 'email',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'nomPatronymique',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 60,
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'nomUsuel',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 60,
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'prenom',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 60,
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => 'prenoms',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            8 => [
                'name' => 'tel',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                ],
            ],
            9 => [
                'name' => 'sourceCode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            10 => [
                'name' => 'histoCreation',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'histoDestruction',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            12 => [
                'name' => 'histoModification',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
];
