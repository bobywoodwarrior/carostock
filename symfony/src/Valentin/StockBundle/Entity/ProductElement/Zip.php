<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 *
 * @ORM\Table(name="zip")
 * @ORM\Entity()
 */
class Zip extends AbstractProductElement
{
    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Product", inversedBy="zip")
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
