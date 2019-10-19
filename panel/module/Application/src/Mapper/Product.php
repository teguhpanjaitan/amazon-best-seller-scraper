<?php

namespace Application\Mapper;

use Application\ORM\Mapper\AbstractMapper;
use Application\ORM\Mapper\MapperInterface;
use Application\Entity\Product as ProductEntity;

class Product extends AbstractMapper implements MapperInterface
{
     public function getEntityRepository()
     {
          return $this->getEntityManager()->getRepository(ProductEntity::class);
     }

     public function fetchAll(array $params = [])
     {
          return $this->getEntityRepository()->findAll();
     }

     public function getTable(array $params = [])
     {
          $length = $params['length'];
          $start = $params['start'];
          $col = $params['col'];
          $dir = $params['dir'];
          $search = $params['search']['value'];

          if ($col == "0") $col = "p.bestSellerRank";
          else if ($col == "1") $col = "p.bestSellerRank";
          else if ($col == "2") $col = "p.asin";
          else if ($col == "3") $col = "p.title";
          else if ($col == "4") $col = "p.price";
          else if ($col == "5") $col = "p.ratings";
          else if ($col == "6") $col = "p.avgRating";

          $queryBuilder = $this->getEntityManager()->createQueryBuilder();

          $queryBuilder->select('p')
               ->from(ProductEntity::class, 'p')
               ->setMaxResults($length)
               ->setFirstResult($start);

          if (!empty($search)) {
               $queryBuilder->andWhere("p.title LIKE :title")
                    ->setParameter('title', "%$search%");
          }

          if (!empty($col)) {
               if ($col == "p.bestSellerRank") {
                    $queryBuilder->addSelect('CASE WHEN p.bestSellerRank IS NULL THEN 1 ELSE 0 END AS HIDDEN bsrIsNull')
                         ->addOrderBy("bsrIsNull", $dir)
                         ->addOrderBy($col, $dir);
               } else {
                    $queryBuilder->addOrderBy($col, $dir);
               }
          }

          $data = $queryBuilder->getQuery()->getResult();
          $this->getEntityManager()->getConnection()->close();

          //for total calculation
          $queryBuilder = $this->getEntityManager()->createQueryBuilder();

          $queryBuilder->select('count(p.id) as count')
               ->from(ProductEntity::class, 'p');

          if (!empty($search)) {
               $queryBuilder->andWhere("p.title LIKE :title")
                    ->setParameter('title', "%$search%");
          }

          $total = $queryBuilder->getQuery()->getSingleResult();
          $this->getEntityManager()->getConnection()->close();

          return ["data" => $data, "total" => $total['count']];
     }
}
