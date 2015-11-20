<?php

namespace Valentin\StockBundle\Service;

use Doctrine\ORM\EntityManager;
use Valentin\StockBundle\Entity\Production;
use Valentin\StockBundle\Entity\ProductModel;

class ProductionService {

    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     * @var Production $production
     */
    protected $production;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Set Production Entity
     *
     * @param Production $production
     *
     * @return $this
     */
    public function setProduction(Production $production)
    {
        $this->production = $production;

        return $this;
    }

    /**
     * Check if add Production is possible
     *
     * @return bool
     */
    public function isNewPossible()
    {
        // Check if ProductsModels exist
        $models = $this->em->getRepository('ValentinStockBundle:ProductModel')->countRecords();

        return ($models > 0) ? true : false;
    }

    public function savedAndDicreasedMaterials()
    {
        if($this->production === null) {
            throw new EntityNotFoundException('Production not loaded');
        }

        // Calculate
        $available = $this->isAvailableTotalQuantity(
            $this->production->getProductModel(),
            $this->production->getTotalSizes()
        );

        $isPossible = true;

        foreach ($model->getMaterials() as $mp) {

            $materialNeeded = $mp->getQuantity() * $total;

            if($mp->getMaterial()->isAvailableQuantity($materialNeeded) === false) {
                $isPossible = false;

                break;
            }
        }

        if ($isPossible === true){

            foreach ($model->getMaterials() as $mp) {

                $materialNeeded = $mp->getQuantity() * $total;

                $mp->getMaterial()->increaseQuantityUsed($materialNeeded);
            }

            $this->em->persist($this->production);
            $this->em->flush();
        }

        return $isPossible;
    }

    public function isEnoughMaterialsForModel(ProductModel $productModel, $total)
    {
        $isAvailable = true;
        $total       = (int) $total;
        $materials   = $productModel->getMaterials();

        foreach ($materials as $mp) {

            $materialsNeeded = $mp->getQuantity() * $total;

            if($mp->getMaterial()->isAvailableQuantity($materialsNeeded) === false) {
                $isAvailable = false;

                break;
            }
        }

        return $isAvailable;
    }

}
