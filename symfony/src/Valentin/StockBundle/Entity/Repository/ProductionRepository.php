<?php

namespace Valentin\StockBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Valentin\StockBundle\Entity\Production;
use Valentin\StockBundle\Entity\ProductModel;


/**
 * ProductModelRepository
 */
class ProductionRepository extends EntityRepository
{

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

        $query->select('p.productModel.name, p.productModel.reference')
            ->leftJoin('p.productModel','productModel')
            ->where('p.productModel.name LIKE :keyword')
            ->orWhere('p.productModel.reference LIKE :keyword')
            ->setParameter('keyword', '%'.$keyword.'%')
            ->orderBy('p.productModel.name','ASC')
            ->setMaxResults(10);

        return $query->getQuery()->getResult();
    }
}
