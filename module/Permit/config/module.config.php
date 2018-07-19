<?php 
namespace Permit;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
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
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
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
        ],
    ],
    'service_manager' => [
        'services' => [
            'model-primary-adapter-config' => [
                'driver' => 'PDO',
                'dsn' => 'mysql:host=it-webdb01.midnet.cityofmiddletown.com;dbname=building-permit',
                'username' => 'building-permit',
                'password' => 'permit-password',
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];