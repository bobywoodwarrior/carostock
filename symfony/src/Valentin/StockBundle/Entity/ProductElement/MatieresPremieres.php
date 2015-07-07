<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductElement
 *
 * @ORM\Table(name="ProductElement")
 * @ORM\Entity()
 */
class ProductElement
{
    /**
     * @ORM\OneToMany(targetEntity="Tissus", mappedBy="ProductElement")
     */
    protected $Cloth;

    /**
     * @ORM\OneToMany(targetEntity="Zip", mappedBy="ProductElement")
     */
    protected $Zip;
    /**
     * @ORM\OneToMany(targetEntity="Boutons", mappedBy="ProductElement")
     */
    protected $Button;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    public function __construct()
    {
        $this->Cloth = new ArrayCollection();
        $this->Zip = new ArrayCollection();
        $this->Button = new ArrayCollection();

    }

    protected $id;

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