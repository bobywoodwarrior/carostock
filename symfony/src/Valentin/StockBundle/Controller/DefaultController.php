<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('ValentinStockBundle:Default:index.html.twig');
    }

    /**
     * @Route("/test", name="test_page")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testAction()
    {
        return $this->render('ValentinStockBundle:Default:test.html.twig', array(
            'plop' => 'une variable passée par le controleur'
        ));
    }
}
