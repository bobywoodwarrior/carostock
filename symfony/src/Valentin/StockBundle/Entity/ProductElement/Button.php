<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Button
 *
 * @ORM\Table(name="product_element_button")
 * @ORM\Entity()
 */
class Button
{
    /**
     * @ORM\ManyToOne(targetEntity="Valentin\StockBundle\Entity\Product", mappedBy"product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;
}
