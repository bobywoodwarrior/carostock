<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\MaterialKind;
use Valentin\StockBundle\Form\MaterialKindType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/admin/material_kind")
 */
class MaterialKindController extends Controller
{
    /**
     * Material Kind Index
     *
     * @Route("/", name="material_kind_index")
     */
    public function indexAction()
    {
        $kinds = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:MaterialKind')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:MaterialKind:index.html.twig', array(
            'kinds' => $kinds
        ));
    }

    /**
     * New Material Kind
     *
     * @Route("/new", name="material_kind_new")
     */
    public function newAction(Request $request)
    {
        $kind = new MaterialKind();

        $form = $this->createForm(new MaterialKindType(), $kind);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($kind);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Type added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'material_kind_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:MaterialKind:new.html.twig', array(
            'form'     => $form->createView()
        ));
    }

    /**
     * Material Kind Edit
     *
     * @param MaterialKind $kind
     * @Route("/edit/{id}", name="material_kind_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, MaterialKind $kind)
    {
        $form = $this->createForm(new MaterialKindType(), $kind);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Type edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'material_kind_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:MaterialKind:edit.html.twig', array(
            'kind' => $kind,
            'form'    => $form->createView()
        ));
    }

    /**
     * Material Kind Delete
     *
     * @Route("/delete/{id}", name="material_kind_delete")
     * @param MaterialKind $kind
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, MaterialKind $kind)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($kind);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Type deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'material_kind_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:MaterialKind:delete.html.twig', array(
            'kind' => $kind
        ));
    }

}
