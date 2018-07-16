<?php 
namespace Permit\Controller\Factory;

use Permit\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new IndexController();
        $controller->setAdapter($container->get('model-primary-adapter'));
        return $controller;
    }
}