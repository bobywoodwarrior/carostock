<?php

namespace Valentin\StockBundle\Service;

use Doctrine\ORM\EntityManager;

class ProductionService {

    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     * @param EntityManager $entityManager
     */
    function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Check if add Production is possible
     *
     * @return bool
     */
    function isNewPossible()
    {
        // Check if ProductsModels exist
        $models = $this->em->getRepository('ValentinStockBundle:ProductModel')->countRecords();

        return ($models > 0) ? true : false;
    }

}
