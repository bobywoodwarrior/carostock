<?php
namespace Valentin\StockBundle\Entity\Commande;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity()
 */
class Commande
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
     * @ORM\Column(name="nombre", type="datetime")
     */
    protected $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="datetime")
     */
    protected $date;

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
        $this->nombre = 1;
    }
}

