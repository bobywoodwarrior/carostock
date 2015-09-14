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
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="saison", type="string", length=255)
     */
    protected $season; //int ou string ?

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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
     */
    public function setNumber($number)
    {
        $this->number = $number;

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
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

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
     * @return Product
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }


}
