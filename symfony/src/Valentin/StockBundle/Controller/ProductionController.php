<?php
namespace Valentin\StockBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Production;
use Valentin\StockBundle\Form\ProductionType;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/09/15
 * Time: 17:46
 */
/**
 * @Route("/production")
 */
class ProductionController extends Controller
{
    /**
     * Production Index
     *
     * @Route("/", name="production_index")
     */
    public function indexAction()
    {
        $productions = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:Production')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:Production:index.html.twig', array(
            'productions' => $productions
        ));
    }

    /**
     * New Production
     *
     * @Route("/new", name="production_new")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $productionService = $this->get('stock.production');

        if (!$productionService->isNewPossible()) {
            $modelPath = $this->generateUrl('product_model_new');
            $this->get('session')->getFlashBag()->add(
                'danger',
                'Impossible to add a new production, no models founds, <a href="'.$modelPath.'">create one before</a>'
            );
            return $this->redirect(
                $this->generateUrl(
                    'production_index'
                )
            );
        }

        // New entity
        $production = new Production();

        $form = $this->createForm(new ProductionType(), $production);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {

                // Set our new production to the service
                $productionService->setProduction($production);

                if ($productionService->savedAndDicreasedMaterials()) {

                    $this->get('session')->getFlashBag()->add(
                        'success',
                        'Production added !'
                    );

                } else {
                    $this->get('session')->getFlashBag()->add(
                        'danger',
                        'Material needed are insuffisant in stock'
                    );
                }

                return $this->redirect(
                    $this->generateUrl(
                        'production_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Production:new.html.twig', array(
            'production' => $production,
            'form'    => $form->createView()
        ));
    }

    /**
     * Production Edit
     *
     * @Route("/edit/{id}", name="production_edit")
     * @param Request $request
     * @param Production $production
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Production $production)
    {
        $form = $this->createForm(new ProductionType(), $production, ['isFull' => false]);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Production edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'production_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Production:edit.html.twig', array(
            'production' => $production,
            'form'       => $form->createView()
        ));
    }

    /**
     * Production Delete
     *
     * @Route("/delete/{id}", name="production_delete")
     * @param Request $request
     * @param Production $production
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Production $production)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($production);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Production deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'production_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Production:delete.html.twig', array(
            'production' => $production
        ));
    }

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
