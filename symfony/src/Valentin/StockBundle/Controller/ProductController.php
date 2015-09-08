<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Product;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */

/**
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * Product Index
     *
     * @Route("/", name="product_index")
     */
    public function indexAction()
    {
        return $this->render('ValentinStockBundle:Product:index.html.twig');
    }
    public function addProduct(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(new Product, $product);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            return $this->redirect($this->generateUrl('task_success'));
        }

        return $this->render('ValentinStockBundle:Product:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
