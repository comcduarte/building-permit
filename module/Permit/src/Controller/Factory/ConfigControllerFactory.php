<?php 
namespace Permit\Controller\Factory;

use Permit\Controller\ConfigController;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ConfigControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new ConfigController();
        $controller->setAdapter($container->get('model-primary-adapter'));
        return $controller;
    }
}