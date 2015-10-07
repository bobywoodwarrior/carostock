<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Material;
use Valentin\StockBundle\Entity\MaterialKind;
use Valentin\StockBundle\Form\MaterialType;
use Valentin\StockBundle\Form\MaterialKindType;

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
        $em         = $this->getDoctrine()->getManager();
        $materials  = $em->getRepository('ValentinStockBundle:Material')->findAll();
        $kinds      = $em->getRepository('ValentinStockBundle:MaterialKind')->findAll();

        return $this->render(
            'ValentinStockBundle:Material:index.html.twig',
            [
                'materials' => $materials,
                'kinds'     => $kinds
            ]
        );
    }

    /**
     * New Material
     *
     * @Route("/new", name="material_new")
     */
    public function newMaterial(Request $request)
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
                    'Material ajouté !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'material_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Material:new_material.html.twig', array(
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
    public function editMaterial(Request $request, Material $material)
    {
        $form = $this->createForm(new RawMaterialType(), $material);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Changements sauvegardés !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'material_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Material:edit_material.html.twig', array(
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
    public function deleteMaterial(Request $request, Material $material)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($material);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Produit supprimé !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'material_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Material:delete_material.html.twig', array(
            'material' => $material
        ));
    }

}
