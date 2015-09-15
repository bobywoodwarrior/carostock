<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\ProductElement\Zip;
use Valentin\StockBundle\Entity\ProductElement\Cloth;
use Valentin\StockBundle\Entity\ProductElement\Button;
use Valentin\StockBundle\Form\ZipType;
use Valentin\StockBundle\Form\ClothType;
use Valentin\StockBundle\Form\ButtonType;



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
        $em = $this->getDoctrine()->getManager();

        $zip    = $em->getRepository('ValentinStockBundle:ProductElement\Zip')->findAll();
        $cloth  = $em->getRepository('ValentinStockBundle:ProductElement\Cloth')->findAll();
        $button = $em->getRepository('ValentinStockBundle:ProductElement\Button')->findAll();


        return $this->render('ValentinStockBundle:ProductElement:index.html.twig', array(
            'zips'      => $zip,
            'cloths'    => $cloth,
            'buttons'   => $button
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
    public function editZip(Request $request, Zip $zip)
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
    public function deleteZip(Request $request, Zip $zip)
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



    /**
     * New Cloth
     *
     * @Route("/new_cloth", name="cloth_new")
     */
    public function newCloth(Request $request)
    {
        $cloth = new Cloth();
        $form = $this->createForm(new ClothType(), $cloth);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($cloth);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Tissu ajouté !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'product_element_index',
                        array(
                            'id' => $cloth->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:ProductElement:new_cloth.html.twig', array(
            'cloth'   => $cloth,
            'form'    => $form->createView()
        ));
    }

    /**
     * Cloth Edit
     *
     * @param Cloth $cloth
     * @Route("/edit_cloth/{id}", name="cloth_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCloth(Request $request, Cloth $cloth)
    {
        $form = $this->createForm(new ClothType(), $cloth);

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
                            'id' => $cloth->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Product:edit.html.twig', array(
            'cloth'   => $cloth,
            'form'    => $form->createView()
        ));
    }

    /**
     * Cloth Delete
     *
     * @Route("/delete_cloth/{id}", name="cloth_delete")
     * @param Cloth $cloth
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteCloth(Request $request, Cloth $cloth)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($cloth);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Tissu supprimé !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'product_element_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:ProductElement:delete_cloth.html.twig', array(
            'cloth' => $cloth
        ));
    }


    /**
     * New Button
     *
     * @Route("/new_button", name="button_new")
     */
    public function newButton(Request $request)
    {
        $button = new Button();
        $form = $this->createForm(new ButtonType(), $button);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($button);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Bouton ajouté !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'product_element_index',
                        array(
                            'id' => $button->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:ProductElement:new_button.html.twig', array(
            'button'   => $button,
            'form'    => $form->createView()
        ));
    }

    /**
     * Button Edit
     *
     * @param Button $button
     * @Route("/edit_button/{id}", name="button_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editButton(Request $request, Button $button)
    {
        $form = $this->createForm(new ButtonType(), $button);

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
                            'id' => $button->getId()
                        )
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Product:edit.html.twig', array(
            'button'   => $button,
            'form'    => $form->createView()
        ));
    }

    /**
     * Button Delete
     *
     * @Route("/delete_button/{id}", name="button_delete")
     * @param Button $button
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteButton(Request $request, Button $button)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($button);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Bouton supprimé !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'product_element_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:ProductElement:delete_button.html.twig', array(
            'button' => $button
        ));
    }
}

