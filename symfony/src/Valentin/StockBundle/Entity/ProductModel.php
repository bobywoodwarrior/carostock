<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ProductModel
 *
 * @ORM\Table(name="product_model")
 * @ORM\Entity(repositoryClass="Valentin\StockBundle\Entity\Repository\ProductModelRepository")
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
     * Materials with their quantities
     *
     * @ORM\OneToMany(targetEntity="MaterialQuantity", mappedBy="productModel", cascade={"persist", "remove"})
     */
    protected $materials;

    /**
     * @ORM\OneToMany(targetEntity="Production", mappedBy="productModel")
     */
    protected $productions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materials = new ArrayCollection();
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
     * Get Materials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterials()
    {
        return $this->materials;
    }

    /**
     * Set materials
     *
     * @param $materials
     *
     * @return ProductModel
     */
    public function setMaterials(Collection $materials)
    {
        foreach ($materials as $material){
            $this->addMaterial($material);
        }
        return $this;
    }

    /**
     * Add material
     *
     * @param MaterialQuantity $material
     * @return ProductModel
     */
    public function addMaterial(MaterialQuantity $material)
    {
        $material->setProductModel($this);
        if (!$this->materials->contains($material)) {
            $this->materials->add($material);
        }
        //$this->material[] = $material;

        return $this;
    }

    /**
     * Remove material
     *
     * @param MaterialQuantity
     */
    public function removeMaterial(MaterialQuantity $material)
    {
        $this->materials->removeElement($material);
    }

}
