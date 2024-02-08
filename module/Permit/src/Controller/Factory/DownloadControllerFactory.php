<?php 
namespace Permit\Controller\Factory;

use Permit\Controller\DownloadController;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DownloadControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new DownloadController();
        $controller->setAdapter($container->get('model-primary-adapter'));
        return $controller;
    }
}