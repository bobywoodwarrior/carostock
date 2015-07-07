<?php

namespace Valentin\StockBundle\Entity\MatieresPremieres;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatieresPremieres
 *
 * @ORM\Table(name="MatieresPremieres")
 * @ORM\Entity()
 */
class MatieresPremieres
{
    /**
     * @ORM\OneToMany(targetEntity="Tissus", mappedBy="MatieresPremieres")
     */
    protected $Tissus;

    /**
     * @ORM\OneToMany(targetEntity="Zip", mappedBy="MatieresPremieres")
     */
    protected $Zip;
    /**
     * @ORM\OneToMany(targetEntity="Boutons", mappedBy="MatieresPremieres")
     */
    protected $Boutons;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    public function __construct()
    {
        $this->Tissus = new ArrayCollection();
        $this->Zip = new ArrayCollection();
        $this->Boutons = new ArrayCollection();

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

}