<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\MaterialQuantity;
use Valentin\StockBundle\Form\MaterialQuantityType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/admin/material_quantity")
 */
class MaterialQuantityController extends Controller
{
    /**
     * Material Kind Index
     *
     * @Route("/", name="material_quantity_index")
     */
    public function indexAction()
    {
        $quantities = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:MaterialQuantity')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:MaterialQuantity:index.html.twig', array(
            'quantities' => $quantities
        ));
    }

    /**
     * New Material Quantity
     *
     * @Route("/new", name="material_quantity_new")
     */
    public function newAction(Request $request)
    {
        $quantity = new MaterialQuantity();

        $form = $this->createForm(new MaterialQuantityType(), $quantity);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($quantity);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Quantity added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'material_quantity_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:MaterialQuantity:new.html.twig', array(
            'form'     => $form->createView()
        ));
    }

    /**
     * Material Quantity Edit
     *
     * @param MaterialQuantity $quantity
     * @Route("/edit/{id}", name="material_quantity_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, MaterialQuantity $quantity)
    {
        $form = $this->createForm(new MaterialQuantityType(), $quantity);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Quantity edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'material_quantity_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:MaterialQuantity:edit.html.twig', array(
            'quantity' => $quantity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Material Quantity Delete
     *
     * @Route("/delete/{id}", name="material_quantity_delete")
     * @param MaterialQuantity $quantity
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, MaterialQuantity $quantity)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($quantity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Quantity deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'material_quantity_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:MaterialQuantity:delete.html.twig', array(
            'quantity' => $quantity
        ));
    }

}
