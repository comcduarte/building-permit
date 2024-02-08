<?php 
namespace Permit\Controller\Factory;

use Permit\Controller\IndexController;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new IndexController();
        $controller->setAdapter($container->get('model-primary-adapter'));
        $controller->setLogger($container->get('syslogger'));
        return $controller;
    }
}