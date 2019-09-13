<?php
namespace Permit;

use Zend\Db\Adapter\Adapter;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'model-primary-adapter' => function ($container) {
                    return new Adapter($container->get('model-primary-adapter-config'));
                }
            ]
        ];
    }
}