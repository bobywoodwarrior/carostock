<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity()
 */
class Product
{
    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\ProductElement\Button", mappedBy="product")
     */
    protected $button;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\ProductElement\Zip", mappedBy="product")
     */
    protected $zip;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\ProductElement\Cloth", mappedBy="product")
     */
    protected $cloth;

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
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(name="season", type="string", length=255)
     */
    protected $season; //int ou string ?

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255)
     */
    protected $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="name_cloth", type="string", length=255)
     */
    protected $name_cloth;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer")
     */
    protected $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_prod", type="integer")
     */
    protected $price_prod;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_whole", type="integer")
     */
    protected $price_whole;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->button   = new ArrayCollection();
        $this->zip      = new ArrayCollection();
        $this->cloth    = new ArrayCollection();
    }

    /**
     * Get Button
     *
     * @return mixed
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * Set button
     *
     * @param mixed $button
     *
     * @return $this
     */
    public function setButton($button)
    {
        $this->button = $button;

        return $this;
    }

    /**
     * Get Zip
     *
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set zip
     *
     * @param mixed $zip
     *
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get Cloth
     *
     * @return mixed
     */
    public function getCloth()
    {
        return $this->cloth;
    }

    /**
     * Set cloth
     *
     * @param mixed $cloth
     *
     * @return $this
     */
    public function setCloth($cloth)
    {
        $this->cloth = $cloth;

        return $this;
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
     * @return $this
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
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param int $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get Season
     *
     * @return string
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set season
     *
     * @param string $season
     *
     * @return $this
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get Ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return $this
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get name_cloth
     *
     * @return string
     */
    public function getNameCloth()
    {
        return $this->name_cloth;
    }

    /**
     * Set name_cloth
     *
     * @param string $name_cloth
     *
     * @return $this
     */
    public function setNameCloth($name_cloth)
    {
        $this->name_cloth = $name_cloth;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set size
     *
     * @param int $size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get price_prod
     *
     * @return int
     */
    public function getPriceProd()
    {
        return $this->price_prod;
    }

    /**
     * Set price_prod
     *
     * @param int $price_prod
     *
     * @return $this
     */
    public function setPriceProd($price_prod)
    {
        $this->price_prod = $price_prod;

        return $this;
    }

    /**
     * Get price_whole
     *
     * @return int
     */
    public function getPriceWhole()
    {
        return $this->price_whole;
    }

    /**
     * Set price_whole
     *
     * @param int $price_whole
     *
     * @return $this
     */
    public function setPriceWhole($price_whole)
    {
        $this->price_whole = $price_whole;

        return $this;
    }
}
