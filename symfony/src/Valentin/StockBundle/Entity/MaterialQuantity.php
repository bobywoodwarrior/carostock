<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MaterialQuantity (quantity material needed for a model)
 *
 * @ORM\Table(name="material_quantity")
 * @ORM\Entity()
 */
class MaterialQuantity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Material", inversedBy="materialQuantity")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $material;

    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\ProductModel", inversedBy="productModel")
     * @ORM\JoinColumn(name="productModel_id", referencedColumnName="id")
     */
    protected $productModel;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return MaterialQuantity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     *
     * @return MaterialQuantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get Material
     *
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set material
     *
     * @param mixed $material
     *
     * @return MaterialQuantity
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get ProductModel
     *
     * @return mixed
     */
    public function getProductModel()
    {
        return $this->productModel;
    }

    /**
     * Set productModel
     *
     * @param mixed $productModel
     *
     * @return MaterialQuantity
     */
    public function setProductModel($productModel)
    {
        $this->productModel = $productModel;

        return $this;
    }

}
