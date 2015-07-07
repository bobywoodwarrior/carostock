<?php
namespace Valentin\StockBundle\Entity\Commande;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity()
 */
class Address
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
     * @ORM\Column(name="numero", type="integer")
     */
    protected $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="postal", type="integer")
     */

    protected $postal;
    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    protected $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    protected $pays;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nombre = 1;
    }
}

