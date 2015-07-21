<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cloth
 *
 * @ORM\Table(name="cloth")
 * @ORM\Entity()
 */
class Cloth extends AbstractProductElement
{
    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Product", inversedBy="cloth")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
