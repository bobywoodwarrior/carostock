<?php

namespace Valentin\StockBundle\Service;

use Doctrine\ORM\EntityManager;
use Valentin\StockBundle\Entity\Material;

class ProductModelService {

    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Check if add Product Model is possible
     *
     * @return bool
     */
    public function isNewPossible()
    {
        // Check if ProductsModels exist
        $productmodels = $this->em->getRepository('ValentinStockBundle:Material')->countRecords();

        return ($productmodels > 0) ? true : false;
    }

}