<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cloth
 *
 * @ORM\Table(name="product_element_cloth")
 * @ORM\Entity()
 */
class Cloth
{
    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Product", mappedBy"product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
}
