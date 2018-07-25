<?php 
namespace Permit;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Application\Controller\IndexController as ApplicationController;

return [
    'router' => [
        'routes' => [
            'default' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/[:controller[/:action]]',
                    'defaults' => [
                        'controller' => ApplicationController::class,
                        'action' => 'index',
                    ],
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'permit' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/permit',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/[:action][/:uuid]',
                        ],
                        'defaults' => [],
                    ],
                ],
            ],
            'config' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/config',
                    'defaults' => [
                        'controller' => Controller\ConfigController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/[:action]',
                        ],
                        'defaults' => [],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\ConfigController::class => Controller\Factory\ConfigControllerFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'Permits',
                'route' => 'permit',
                'pages' => [
                    [
                        'label' => 'List Permits',
                        'route' => 'permit',
                    ],
                    [
                        'label' => 'Create Permit',
                        'route' => 'permit/default',
                        'action' => 'create',
                    ],
                ],
            ],
            [
                'label' => 'Config',
                'route' => 'config',
                'pages' => [
                    [
                        'label' => 'Create Database Table',
                        'route' => 'config/default',
                        'action' => 'create',
                    ],
                    [
                        'label' => 'Drop Database Table',
                        'route' => 'config/default',
                        'action' => 'drop',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'services' => [
            'model-primary-adapter-config' => [
                'driver' => 'PDO',
                'dsn' => 'mysql:host=it-webdb01.midnet.cityofmiddletown.com;dbname=building-permit',
                'username' => 'building-permit',
                'password' => 'bAtMDQVrMutljgxOOvii',
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];