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

    /**
     * Search by name or ref %like%
     *
     * @param $keyword
     * @return mixed
     */
    public function searchLikeKeyword($keyword)
    {
        $keyword = strtolower($keyword);
        $query = $this->createQueryBuilder('p');

        $query->select('p.id, p.name, p.reference')
            ->where('p.name LIKE :keyword')
            ->orWhere('p.reference LIKE :keyword')
            ->setParameter('keyword', '%'.$keyword.'%')
            ->orderBy('p.name','ASC')
            ->setMaxResults(10);

        return $query->getQuery()->getResult();
    }
}
