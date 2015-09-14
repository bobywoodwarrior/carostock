<?php
namespace Valentin\StockBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\ProductElement\AbstractProductElement;
use Valentin\StockBundle\Form\ProductElementType;


/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/09/15
 * Time: 11:03
 */
/**
 * @Route("/product_element")
 */
class ProductElementController extends Controller
{
    /**
     * Product Index
     *
     * @Route("/", name="product_element_index")
     */
    public function indexAction()
    {
        $product = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:AbstractProductElement')
            ->findAll();
        return $this->render('ValentinStockBundle:ProductElement:index.html.twig', array(
            'products' => $product
        ));
    }
}