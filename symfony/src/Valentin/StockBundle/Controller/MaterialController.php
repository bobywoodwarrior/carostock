<?php
namespace Valentin\StockBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Material;
use Valentin\StockBundle\Entity\MaterialType;
use Valentin\StockBundle\Form\RawMaterialType;
use Valentin\StockBundle\Form\MaterialTypeType;

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
        $types      = $em->getRepository('ValentinStockBundle:MaterialType')->findAll();
        return $this->render(
            'ValentinStockBundle:Material:index.html.twig',
            [
                'materials' => $materials,
                'types'     => $types
            ]
        );
    }

    /**
     * New Material
     *
     * @Route("/new_material", name="material_new")
     */
    public function newMaterial(Request $request)
    {
        $material = new Material();
        $form = $this->createForm(new RawMaterialType(), $material);
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
            'material' => $material,
            'form'     => $form->createView()
        ));
    }

    /**
     * Material Edit
     *
     * @param Material $material
     * @Route("/edit_material/{id}", name="material_edit")
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
     * @Route("/delete_material/{id}", name="material_delete")
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



    /**
     * New Material Type
     *
     * @Route("/new_type", name="material_type_new")
     */
    public function newType(Request $request)
    {
        $type = new MaterialType();
        $form = $this->createForm(new MaterialTypeType(), $type);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($type);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Type ajouté !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'material_index'
                    )
                );
            }
        }
        return $this->render('ValentinStockBundle:Material:new_material_type.html.twig', array(
            'type' => $type,
            'form' => $form->createView()
        ));
    }

    /**
     * Material Type Delete
     *
     * @Route("/delete_type/{id}", name="material_type_delete")
     * @param MaterialType $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteType(Request $request, MaterialType $type)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($type);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Type supprimé !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'material_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Material:delete_material_type.html.twig', array(
            'type' => $type
        ));
    }
}
