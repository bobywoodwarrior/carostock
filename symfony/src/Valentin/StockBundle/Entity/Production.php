<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Product
 *
 * @ORM\Table(name="production")
 * @ORM\Entity(repositoryClass="Valentin\StockBundle\Entity\Repository\ProductionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Production
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
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Season", inversedBy="productions")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    protected $season;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_whole", type="integer")
     */
    protected $priceWhole;

    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\ProductModel", inversedBy="products")
     * @ORM\JoinColumn(name="productModel_id", referencedColumnName="id")
     */
    protected $productModel;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_uniq", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeUniq = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_zero", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeZero = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_one", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeOne = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_two", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeTwo = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_three", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeThree = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_four", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeFour = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty_size_five", type="integer", options={"unsigned"=true, "default" = 0})
     */
    protected $quantitySizeFive = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
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

    /**
     * Get PriceWhole
     *
     * @return int
     */
    public function getPriceWhole()
    {
        return $this->priceWhole;
    }

    /**
     * Set priceWhole
     *
     * @param int $priceWhole
     *
     * @return Product
     */
    public function setPriceWhole($priceWhole)
    {
        $this->priceWhole = $priceWhole;

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
     * @return Product
     */
    public function setProductModel($productModel)
    {
        $this->productModel = $productModel;

        return $this;
    }

    /**
     * Get CreatedAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get QuantitySizeUniq
     *
     * @return int
     */
    public function getQuantitySizeUniq()
    {
        return $this->quantitySizeUniq;
    }

    /**
     * Set quantitySizeUniq
     *
     * @param int $quantitySizeUniq
     *
     * @return Production
     */
    public function setQuantitySizeUniq($quantitySizeUniq)
    {
        $this->quantitySizeUniq = $quantitySizeUniq;

        return $this;
    }

    /**
     * Get QuantitySizeZero
     *
     * @return int
     */
    public function getQuantitySizeZero()
    {
        return $this->quantitySizeZero;
    }

    /**
     * Set quantitySizeZero
     *
     * @param int $quantitySizeZero
     *
     * @return Production
     */
    public function setQuantitySizeZero($quantitySizeZero)
    {
        $this->quantitySizeZero = $quantitySizeZero;

        return $this;
    }

    /**
     * Get QuantitySizeOne
     *
     * @return int
     */
    public function getQuantitySizeOne()
    {
        return $this->quantitySizeOne;
    }

    /**
     * Set quantitySizeOne
     *
     * @param int $quantitySizeOne
     *
     * @return Production
     */
    public function setQuantitySizeOne($quantitySizeOne)
    {
        $this->quantitySizeOne = $quantitySizeOne;

        return $this;
    }

    /**
     * Get QuantitySizeTwo
     *
     * @return int
     */
    public function getQuantitySizeTwo()
    {
        return $this->quantitySizeTwo;
    }

    /**
     * Set quantitySizeTwo
     *
     * @param int $quantitySizeTwo
     *
     * @return Production
     */
    public function setQuantitySizeTwo($quantitySizeTwo)
    {
        $this->quantitySizeTwo = $quantitySizeTwo;

        return $this;
    }

    /**
     * Get QuantitySizeThree
     *
     * @return int
     */
    public function getQuantitySizeThree()
    {
        return $this->quantitySizeThree;
    }

    /**
     * Set quantitySizeThree
     *
     * @param int $quantitySizeThree
     *
     * @return Production
     */
    public function setQuantitySizeThree($quantitySizeThree)
    {
        $this->quantitySizeThree = $quantitySizeThree;

        return $this;
    }

    /**
     * Get QuantitySizeFour
     *
     * @return int
     */
    public function getQuantitySizeFour()
    {
        return $this->quantitySizeFour;
    }

    /**
     * Set quantitySizeFour
     *
     * @param int $quantitySizeFour
     *
     * @return Production
     */
    public function setQuantitySizeFour($quantitySizeFour)
    {
        $this->quantitySizeFour = $quantitySizeFour;

        return $this;
    }

    /**
     * Get QuantitySizeFive
     *
     * @return int
     */
    public function getQuantitySizeFive()
    {
        return $this->quantitySizeFive;
    }

    /**
     * Set quantitySizeFive
     *
     * @param int $quantitySizeFive
     *
     * @return Production
     */
    public function setQuantitySizeFive($quantitySizeFive)
    {
        $this->quantitySizeFive = $quantitySizeFive;

        return $this;
    }

    /**
     * Get total quantities sizes
     *
     *
     * @return int
     */
    public function getTotalSizes()
    {
        $total = 0;
        $total += $this->getQuantitySizeUniq();
        $total += $this->getQuantitySizeZero();
        $total += $this->getQuantitySizeOne();
        $total += $this->getQuantitySizeTwo();
        $total += $this->getQuantitySizeThree();
        $total += $this->getQuantitySizeFour();
        $total += $this->getQuantitySizeFive();

        return (int) $total;
    }
}
