<?php

namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
        return $this->render('ValentinStockBundle:Default:index.html.twig');
    }

    /**
     * @Route("/admin", name="admin_login")
     */
    public function adminAction()
    {
        return $this->redirect(
            $this->generateUrl(
                'production_index'
            )
        );
    }
}
