<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zip
 *
 * @ORM\Table(name="product_element_zip")
 * @ORM\Entity()
 */
class Zip
{
    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Product", mappedBy"product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
}
