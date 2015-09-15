<?php

namespace Valentin\StockBundle\Entity\ProductElement;

use Doctrine\ORM\Mapping as ORM;

/**
 * Button
 *
 * @ORM\Table(name="button")
 * @ORM\Entity()
 */
class Button extends AbstractProductElement
{
    /**
     * @ORM\ManyToMany(targetEntity="Valentin\StockBundle\Entity\Product", inversedBy="button")
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
