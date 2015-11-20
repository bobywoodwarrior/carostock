<?php

namespace Valentin\StockBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Valentin\StockBundle\Entity\ProductModel;

/**
 * ProductModelRepository
 */
class ProductModelRepository extends EntityRepository
{
    /**
     * Count records
     *
     * @return int
     * @throws \Doctrine\ORM
     */
    public function countRecords()
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
