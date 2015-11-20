<?php
namespace Valentin\StockBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\MaterialQuantity;
use Valentin\StockBundle\Entity\ProductModel;
use Valentin\StockBundle\Form\ProductModelType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/productModel")
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
    public function newAction(Request $request)
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
    public function editAction(Request $request, ProductModel $model)
    {
        // Keep old materials
        $originalMaterials = new ArrayCollection();

        foreach($model->getMaterials() as $material) {
            $originalMaterials->add($material);
        }

        $form = $this->createForm(new ProductModelType(), $model);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                // New materials
                foreach ($originalMaterials as $material) {
                    if ($model->getMaterials()->contains($material) === false){

                        $em->remove($material);
                    }
                }

                $em->persist($model);
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
    public function deleteAction(Request $request, ProductModel $model)
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

    /**
     * Model check enough materials ajax
     *
     * @Route("/ajaxCheckMaterials", name="ajax_model_enough_material")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajaxCheckMaterialsAction(Request $request)
    {
        // Todo
        // check model exist/ return false sinon

        $modelId     = $request->query->get('modelId');
        $totalSizes  = $request->query->get('totalSizes');

        $model = $this->getDoctrine()
            ->getRepository('ValentinStockBundle:ProductModel')
            ->find($modelId);

        $isPossible = $this->get('stock.production')->isEnoughMaterialsForModel($model, $totalSizes);

        return $isPossible;
    }

}
