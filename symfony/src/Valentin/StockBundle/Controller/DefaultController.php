<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/{name}", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('ValentinStockBundle:Default:index.html.twig', array(
            'toto' => $name
        ));
    }
}
