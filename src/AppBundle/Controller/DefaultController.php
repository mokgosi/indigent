<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="dashboard")
     * @Security("has_role('ROLE_USER')") 
     * 
     * Roles ROLE_USER, ROLE_ADMIN
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')
                ->getBarGraphValues();

        $entities1 = $em->getRepository('AppBundle:Payment')
                ->getPieGraphValues();

        $recents = $em->getRepository('AppBundle:Payment')
                ->getRecent();
        
        $allPayments = $em->getRepository('AppBundle:Payment')
                ->getAllPayments();
        
        $completed = $em->getRepository('AppBundle:Payment')
                ->getCompleted();
        
        $cancelled = $em->getRepository('AppBundle:Payment')
                ->getCancelled();
        
        $revenue = $em->getRepository('AppBundle:Payment')
                ->getRevenue();

        return $this->render('default/index.html.twig', array(
                    'entities' => json_encode($entities),
                    'entities1' => json_encode($entities1),
                    'recents' => $recents,
                    'allPayments' => $allPayments,
                    'completed' => $completed,
                    'cancelled' => $cancelled,
                    'revenue' => $revenue
        ));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        $keyword = $request->request->get('search');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Erf')
                ->findByErfNo($keyword);
        
        dump($entity);

        return $this->render('erf/search.html.twig', array(
                    'entity' => $entity,
                    'id' => $entity->getId()
        ));
    }

}
