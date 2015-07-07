<?php

namespace Valentin\StockBundle\Entity\MatieresPremieres;

use Doctrine\ORM\Mapping as ORM;
/**
 * Tissus
 *
 * @ORM\Table(name="tissus")
 * @ORM\Entity()
 */
class Tissus extends MatieresPremieres
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
     * @ORM\Column(name="metre", type="float")
     */
    protected $metre;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;//ref ou nom ?


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
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
