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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
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