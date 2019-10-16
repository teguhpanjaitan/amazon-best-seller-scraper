<?php

namespace Application\Mapper;

use Application\ORM\Mapper\AbstractMapper;
use Application\ORM\Mapper\MapperInterface;
use Application\Entity\ProductLog as ProductLogEntity;

class ProductLog extends AbstractMapper implements MapperInterface
{
     public function getEntityRepository()
     {
          return $this->getEntityManager()->getRepository(ProductLogEntity::class);
     }

     public function fetchAll(array $params = [])
     {
          return $this->getEntityRepository()->findAll();
     }

     public function getProductHistoryByASIN($asin)
     {
          $end = date("Y-m-d");
          $start = date('Y-m-d', strtotime('-30 days'));

          $queryBuilder = $this->getEntityManager()->createQueryBuilder();

          $queryBuilder->select('pl')
               ->from(ProductLogEntity::class, 'pl')
               ->where("pl.createdOn BETWEEN :start AND :end")
                    ->setParameter('start', $start)
                    ->setParameter('end', $end);
          
          $data = $queryBuilder->getQuery()->getResult();
          $this->getEntityManager()->getConnection()->close();
          
          return $data;
     }
}
