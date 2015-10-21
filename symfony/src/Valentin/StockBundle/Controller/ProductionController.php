<?php
namespace Valentin\StockBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Production;
use Valentin\StockBundle\Form\ProductionType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/production")
 */
class ProductionController extends Controller
{
    /**
     * Production Index
     *
     * @Route("/", name="production_index")
     */
    public function indexAction()
    {
        $productions = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:Production')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:Production:index.html.twig', array(
            'productions' => $productions
        ));
    }

    /**
     * New Production
     *
     * @Route("/new", name="production_new")
     */
    public function newProduction(Request $request)
    {
        $production = new Production();
        $form = $this->createForm(new ProductionType(), $production);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($production);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Production added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'production_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Production:new.html.twig', array(
            'production' => $production,
            'form'    => $form->createView()
        ));
    }

    /**
     * Production Edit
     *
     * @param Production $production
     * @Route("/edit/{id}", name="production_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editMaterial(Request $request, Production $production)
    {
        $form = $this->createForm(new ProductionType(), $production);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Material edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'production_index'
                    )
                );
            }
        }

        $form->remove('productModel');

        return $this->render('ValentinStockBundle:Production:edit.html.twig', array(
            'production' => $production,
            'form'    => $form->createView()
        ));
    }

    /**
     * Production Delete
     *
     * @Route("/delete/{id}", name="production_delete")
     * @param Production $production
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteProduct(Request $request, Production $production)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($production);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Production deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'production_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Production:delete.html.twig', array(
            'production' => $production
        ));
    }
}
