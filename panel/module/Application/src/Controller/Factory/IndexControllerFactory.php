<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\ProductManager;
use Application\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
     public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
     {
          $productManager = $container->get(ProductManager::class);
          
          return new IndexController($productManager);
     }

}