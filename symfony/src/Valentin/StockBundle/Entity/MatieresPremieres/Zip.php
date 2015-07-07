<?php

namespace Valentin\StockBundle\Entity\MatieresPremieres;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 *
 * @ORM\Table(name="Zip")
 * @ORM\Entity()
 */
class Zip extends MatieresPremieres
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
     * @ORM\Column(name="number", type="integer")
     */
    protected $number;

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
