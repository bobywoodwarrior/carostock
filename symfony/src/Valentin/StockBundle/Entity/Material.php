<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Material (raw material - matière premiere)
 *
 * @ORM\Table(name="material")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Material
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    protected $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    protected $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    protected $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="decimal")
     */
    protected $price;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\MaterialQuantity", mappedBy="material")
     */
    protected $materialsQuantity;

    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\MaterialType", inversedBy="material")
     * @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     */
    protected $materialType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

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
     * @return Material
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
     * @return Material
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
     * @return Material
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get Brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Material
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get Color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Material
     */
    public function setColor($color)
    {
        $this->color = $color;

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
     * @return Material
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param int $price
     *
     * @return Material
     */
    public function setPrice($price)
    {
        $this->price = $price;

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
     * @return Material
     */
    public function setMaterialsQuantity($materialsQuantity)
    {
        $this->materialsQuantity = $materialsQuantity;

        return $this;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Material
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Material
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Generate updatedAt
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * @return Material
     */
    public function updateDate()
    {
        if($this->getCreatedAt() === null){
            $this->setCreatedAt(new \DateTime("now"));
        }
        if($this->getUpdatedAt() === null){
            $this->setUpdatedAt(new \DateTime("now"));
        }

        return $this;
    }

    /**
     * Get MaterialType
     *
     * @return mixed
     */
    public function getMaterialType()
    {
        return $this->materialType;
    }

    /**
     * Set materialType
     *
     * @param mixed $materialType
     *
     * @return Material
     */
    public function setMaterialType($materialType)
    {
        $this->materialType = $materialType;

        return $this;
    }
}
