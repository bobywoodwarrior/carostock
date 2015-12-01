<?php
namespace Valentin\StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Valentin\StockBundle\Entity\Season;
use Valentin\StockBundle\Form\SeasonType;

/**
 * @Route("/admin/season")
 */
class SeasonController extends Controller
{
    /**
     * Season Index
     *
     * @Route("/", name="season_index")
     */
    public function indexAction()
    {
        $seasons = $this->getDoctrine()->getManager()
            ->getRepository('ValentinStockBundle:Season')
            ->findAll()
        ;
        return $this->render('ValentinStockBundle:Season:index.html.twig', array(
            'seasons' => $seasons
        ));
    }

    /**
     * New Season
     *
     * @Route("/new", name="season_new")
     */
    public function newAction(Request $request)
    {
        $season = new Season();

        $form = $this->createForm(new SeasonType(), $season);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($season);
                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Season added !'
                );
                return $this->redirect(
                    $this->generateUrl(
                        'season_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Season:new.html.twig', array(
            'form'     => $form->createView()
        ));
    }

    /**
     * Season Edit
     *
     * @param Season $season
     * @Route("/edit/{id}", name="season_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Season $season)
    {
        $form = $this->createForm(new SeasonType(), $season);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->flush();
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Season edited !'
                );

                return $this->redirect(
                    $this->generateUrl(
                        'season_index'
                    )
                );
            }
        }

        return $this->render('ValentinStockBundle:Season:edit.html.twig', array(
            'season' => $season,
            'form'    => $form->createView()
        ));
    }

    /**
     * Season Delete
     *
     * @Route("/delete/{id}", name="season_delete")
     * @param Season $season
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Season $season)
    {
        if ($request->getMethod() === 'POST'){
            $em = $this->getDoctrine()->getManager();

            $em->remove($season);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Season deleted !'
            );

            return $this->redirect(
                $this->generateUrl(
                    'season_index'
                )
            );
        }

        return $this->render('ValentinStockBundle:Season:delete.html.twig', array(
            'season' => $season
        ));
    }
}