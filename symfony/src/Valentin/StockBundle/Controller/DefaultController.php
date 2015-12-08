<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->redirect(
            $this->generateUrl('admin_homepage')
        );
    }

    /**
     * @Route("/admin", name="admin_homepage")
     */
    public function adminAction()
    {
        return $this->render('ValentinStockBundle:Default:index.html.twig');
    }

    /**
     * Global search in multiple entities
     *
     * @Route("/admin/search", name="admin_search")
     */
    public function adminSearchAction(Request $request)
    {
        $result = ['suggestions' => []];

        $keyword = $request->get('query');
        $entity  = $request->get('entity');

        switch ($entity) {
            /* **********PRODUCTION********** */
            case 'production':
                $resultsQuery = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('ValentinStockBundle:Production')
                    ->searchLikeKeyword($keyword);

                foreach ($resultsQuery as $item) {
                    $result['suggestions'][] = [
                        'value' => '['.$item['reference'].']'. ' ' .$item['name'],
                        'data'  => $item['name']
                    ];
                }
                break;
            /* **********PRODUCT MODEL********** */
            case 'productModel':
                $resultsQuery = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('ValentinStockBundle:ProductModel')
                    ->searchLikeKeyword($keyword);

                foreach ($resultsQuery as $item) {
                    $result['suggestions'][] = [
                        'value' => '['.$item['reference'].']'. ' ' .$item['name'],
                        'data'  => $item['name']
                    ];
                }
                break;
            /* **********MATERIAL********** */
            case 'material':
                $resultsQuery = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('ValentinStockBundle:Material')
                    ->searchLikeKeyword($keyword);

                foreach ($resultsQuery as $item) {
                    $result['suggestions'][] = [
                        'value' => '['.$item['reference'].']'. ' ' .$item['name']. ' ' .'('.$item['color'].')'. ' : ' .$item['quantityUsed'].'/'.$item['quantity'],
                        'data'  => $item['name']
                    ];
                }
                break;
        }

        return new JsonResponse($result);
    }
}
