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
                        'action' => 'create',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'create' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/create',
                        ],
                        'defaults' => [
                            'action' => 'create',
                        ],
                    ],
                    'read' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/receipt[/:uuid]',
                        ],
                        'defaults' => [
                            'action' => 'receipt',
                        ],
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
            'download' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/download',
                    'defaults' => [
                        'controller' => Controller\DownloadController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => TRUE,
                'child_routes' => [
                    'default' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/[:action][/:filename]',
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
            Controller\DownloadController::class => Controller\Factory\DownloadControllerFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [],
        'admin' => [
            [
                'label' => 'Permits',
                'route' => 'permit',
                'order' => 100,
                'pages' => [
                    [
                        'label' => 'List Permits',
                        'route' => 'permit',
                    ],
                    [
                        'label' => 'Create Permit',
                        'route' => 'permit/create',
                        'action' => 'create',
                    ],
                ],
            ],
            [
                'label' => 'Config',
                'route' => 'config',
                'order' => 300,
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
            [
                'label' => 'Downloads',
                'route' => 'download',
                'order' => 200,
                'pages' => [
                    [
                        'label' => 'Download Consent Form',
                        'route' => 'download/default',
                        'action' => 'pdf',
                        'params' => [
                            'filename' => 'consent_form',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];