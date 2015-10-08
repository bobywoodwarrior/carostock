<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\ProductModel;
use Valentin\StockBundle\Form\ProductModelType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/product_model")
 */
class ProductModelController extends Controller
{
    /**
     * Product Model Index
     *
     * @Route("/", name="product_model_index")
     */
    public function indexAction()
    {
        $models = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:ProductModel')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:ProductModel:index.html.twig', array(
            'models' => $models
        ));
    }

    /**
     * New Product Model
     *
     * @Route("/new", name="product_model_new")
     */
    public function newMaterial(Request $request)
    {
        $model = new ProductModel();

        $form = $this->createForm(new ProductModelType(), $model);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($model);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Model added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'product_model_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:ProductModel:new.html.twig', array(
            'form'     => $form->createView()
        ));
    }

    /**
     * Product Model Edit
     *
     * @param ProductModel $model
     * @Route("/edit/{id}", name="product_model_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editMaterial(Request $request, ProductModel $model)
    {
        $form = $this->createForm(new ProductModelType(), $model);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Model edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'product_model_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:ProductModel:edit.html.twig', array(
            'model' => $model,
            'form'    => $form->createView()
        ));
    }

    /**
     * Product Model Delete
     *
     * @Route("/delete/{id}", name="product_model_delete")
     * @param ProductModel $model
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteMaterial(Request $request, ProductModel $model)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($model);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Model deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'product_model_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:ProductModel:delete.html.twig', array(
            'model' => $model
        ));
    }

}
