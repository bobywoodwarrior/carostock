<?php

namespace Valentin\StockBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Valentin\StockBundle\Entity\Material;

/**
 * MaterialRepository
 */
class MaterialRepository extends EntityRepository
{
    /**
     * Count records
     *
     * @return int
     * @throws \Doctrine\ORM
     */
    public function countRecords()
    {
        return $this->createQueryBuilder('m')
            ->select('COUNT(m)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
