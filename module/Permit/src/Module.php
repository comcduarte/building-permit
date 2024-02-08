<?php
namespace Permit;

use Laminas\Db\Adapter\Adapter;
use Laminas\EventManager\LazyListenerAggregate;
use Laminas\Mvc\MvcEvent;
use Permit\Listener\PermitListener;

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