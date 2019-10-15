<?php

namespace Application\ORM\Mapper;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Trait for EntityManager
 *
 */
trait EntityManagerTrait
{
    /**
     * EntityManager Object
     *
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * Set EntityManager
     *
     * @param  EntityManagerInterface $entityManager
     *
     * @return $this
     */
    public function setEntityManager(EntityManagerInterface $em)
    {
        $this->em = $em;
        return $this;
    }

    /**
     * Get EntityManager
     *
     * @return EntityManagerInterface
     **/
    public function getEntityManager()
    {
        return $this->em;
    }
}
