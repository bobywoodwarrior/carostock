<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Product;
use Valentin\StockBundle\Form\ProductType;

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
        $products = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:Product')
            ->findAll()
        ;

        return $this->render('ValentinStockBundle:Product:index.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * Product Index
     *
     * @Route("/add", name="product_add")
     */
    public function addProduct(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(new ProductType(), $product);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($product);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Produit ajouté!'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'product_index',
                        array(
                            'id' => $product->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Product:add.html.twig', array(
            'product' => $product,
            'form'    => $form->createView()
        ));
    }
}
