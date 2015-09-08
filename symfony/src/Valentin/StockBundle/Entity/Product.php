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

    public function __construct()
    {
        $this->button = new ArrayCollection();
        $this->zip = new ArrayCollection();
        $this->cloth = new ArrayCollection();
    }

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getButton()
    {
        return $this->button;
    }

    /**
     * @param mixed $button
     */
    public function setButton($button)
    {
        $this->button = $button;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getCloth()
    {
        return $this->cloth;
    }

    /**
     * @param mixed $cloth
     */
    public function setCloth($cloth)
    {
        $this->cloth = $cloth;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param string $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }


}
