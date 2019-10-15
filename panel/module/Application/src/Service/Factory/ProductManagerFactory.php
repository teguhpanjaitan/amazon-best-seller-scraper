<?php
namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Application\Service\ProductManager;
use Application\Mapper\Product;

class ProductManagerFactory
{
     public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
     {
          $productMapper = $container->get(Product::class);

          return new ProductManager($productMapper);
     }
}
