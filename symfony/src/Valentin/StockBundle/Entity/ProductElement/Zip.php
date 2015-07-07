<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 *
 * @ORM\Table(name="Zip")
 * @ORM\Entity()
 */
class Zip extends ProductElement
{
    /**
     * @ORM\ManyToOne(targetEntity="ProductElement", inversedBy="zip")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $ProductElement;
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
     * @ORM\Column(name="stock", type="integer")
     */
    protected $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name; //ref ou nom ?


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = 4;
    }

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
