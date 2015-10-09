<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProductModel
 *
 * @ORM\Table(name="product_model")
 * @ORM\Entity()
 */
class ProductModel
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    protected $reference;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\MaterialQuantity", mappedBy="productModel", cascade={"persist"})
     */
    protected $materialsQuantity;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\Product", mappedBy="product")
     */
    protected $products;

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
     * @return ProductModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ProductModel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return ProductModel
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get MaterialsQuantity
     *
     * @return mixed
     */
    public function getMaterialsQuantity()
    {
        return $this->materialsQuantity;
    }

    /**
     * Set materialsQuantity
     *
     * @param mixed $materialsQuantity
     *
     * @return ProductModel
     */
    public function setMaterialsQuantity($materialsQuantity)
    {
        $this->materialsQuantity = $materialsQuantity;

        return $this;
    }


}
