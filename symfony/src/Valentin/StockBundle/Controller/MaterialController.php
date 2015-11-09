<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Material;
use Valentin\StockBundle\Form\MaterialType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/material")
 */
class MaterialController extends Controller
{
    /**
     * Material Index
     *
     * @Route("/", name="material_index")
     */
    public function indexAction()
    {
        $materials = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:Material')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:Material:index.html.twig', array(
            'materials' => $materials
        ));
    }

    /**
     * New Material
     *
     * @Route("/new", name="material_new")
     */
    public function newAction(Request $request)
    {
        $material = new Material();

        $form = $this->createForm(new MaterialType(), $material);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($material);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Material added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'material_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Material:new.html.twig', array(
            'form'     => $form->createView()
        ));
    }

    /**
     * Material Edit
     *
     * @param Material $material
     * @Route("/edit/{id}", name="material_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Material $material)
    {
        $form = $this->createForm(new MaterialType(), $material);

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
                        'material_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Material:edit.html.twig', array(
            'material' => $material,
            'form'    => $form->createView()
        ));
    }

    /**
     * Material Delete
     *
     * @Route("/delete/{id}", name="material_delete")
     * @param Material $material
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Material $material)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($material);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Material deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'material_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Material:delete.html.twig', array(
            'material' => $material
        ));
    }

}
