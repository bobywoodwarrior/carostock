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
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\Button", mappedBy="product")
     */
    protected $button;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\Zip", mappedBy="product")
     */
    protected $zip;

    /**
     * @ORM\OneToMany(targetEntity="Valentin\StockBundle\Entity\Cloth", mappedBy="product")
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
}
