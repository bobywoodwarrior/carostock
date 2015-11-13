<?php
namespace Valentin\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */

class Season
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Production", mappedBy="season")
     */
    protected $productions;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProductions()
    {
        return $this->productions;
    }

    /**
     * @param mixed $productions
     */
    public function setProductions($productions)
    {
        $this->productions = $productions;
    }
}