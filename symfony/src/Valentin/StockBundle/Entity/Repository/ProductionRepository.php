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

        $query->select('productModel.name, productModel.reference')
            ->leftJoin('p.productModel','productModel')
            ->where('productModel.name LIKE :keyword')
            ->orWhere('productModel.reference LIKE :keyword')
            ->setParameter('keyword', '%'.$keyword.'%')
            ->orderBy('productModel.name','ASC')
            ->setMaxResults(10);

        return $query->getQuery()->getResult();
    }
}
