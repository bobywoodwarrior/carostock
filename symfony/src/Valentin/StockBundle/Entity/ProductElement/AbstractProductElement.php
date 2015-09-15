<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractProductElement
{
    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="AbstractProductElement")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
