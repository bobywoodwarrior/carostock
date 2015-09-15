<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\ProductElement\Zip;
use Valentin\StockBundle\Form\ZipType;


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
     * Product Element Index
     *
     * @Route("/", name="product_element_index")
     */
    public function indexAction()
    {
        $zip = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:ProductElement\Zip')
            ->findAll();
        return $this->render('ValentinStockBundle:ProductElement:index.html.twig', array(
            'zips' => $zip
        ));
    }

    /**
     * New Zip
     *
     * @Route("/new_zip", name="zip_new")
     */
    public function newZip(Request $request)
    {
        $zip = new Zip();
        $form = $this->createForm(new ZipType(), $zip);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($zip);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Zip ajouté !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'product_element_index',
                        array(
                            'id' => $zip->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:ProductElement:new_zip.html.twig', array(
            'zip'     => $zip,
            'form'    => $form->createView()
        ));
    }

    /**
     * Zip Edit
     *
     * @param Zip $zip
     * @Route("/edit_zip/{id}", name="zip_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Zip $zip)
    {
        $form = $this->createForm(new ZipType(), $zip);

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
                        'product_element_index',
                        array(
                            'id' => $zip->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Product:edit.html.twig', array(
            'zip'     => $zip,
            'form'    => $form->createView()
        ));
    }

    /**
     * Zip Delete
     *
     * @Route("/delete_zip/{id}", name="zip_delete")
     * @param Zip $zip
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Zip $zip)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($zip);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Zip supprimé !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'product_element_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:ProductElement:delete_zip.html.twig', array(
            'zip' => $zip
        ));
    }
}

