<?php

namespace Application\ORM\Mapper;

use Doctrine\ORM\EntityManagerInterface;
use Application\ORM\Entity\EntityInterface;

/**
 * Interface of Entity
 *
 */
interface MapperInterface
{
    public function setEntityManager(EntityManagerInterface $em);

    public function getEntityManager();

    public function getEntityRepository();

    public function fetchOne($id);

    public function fetchAll(array $params);

    public function save(EntityInterface $entity);

    public function delete(EntityInterface $entity);
}
