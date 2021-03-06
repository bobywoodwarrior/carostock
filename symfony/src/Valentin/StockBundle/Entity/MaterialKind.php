<?php

namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MaterialKind
 *
 * @ORM\Table(name="material_kind")
 * @ORM\Entity()
 */
class MaterialKind
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=255)
     */
    protected $unit;

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
     * @return MaterialKind
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
     * @return MaterialKind
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return MaterialKind
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }
}
