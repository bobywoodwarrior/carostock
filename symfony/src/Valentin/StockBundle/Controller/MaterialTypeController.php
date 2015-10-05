<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\MaterialType;
use Valentin\StockBundle\Form\MaterialTypeType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 02/10/15
 * Time: 17:58
 */
/**
 * @Route("/material_type")
 */
class MaterialTypeController extends Controller
{
    /**
     * Material Type Index
     *
     * @Route("/", name="material_type_index")
     */
    public function indexAction()
    {
        $types = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:MaterialType')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:Material:index.html.twig', array(
            'types' => $types
        ));
    }

    /**
     * New Material Type
     *
     * @Route("/new_type", name="material_type_new")
     */
    public function newProduct(Request $request)
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
                        'material_type_index'
                    )
                );
            }
        }
        return $this->render('ValentinStockBundle:Material:new_material_type.html.twig', array(
            'type' => $type,
            'form'    => $form->createView()
        ));
    }

    /**
     * Material Type Delete
     *
     * @Route("/delete/{id}", name="material_type_delete")
     * @param MaterialType $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, MaterialType $type)
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
                    'material_type_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Material:delete_material_type.html.twig', array(
            'type' => $type
        ));
    }
}
