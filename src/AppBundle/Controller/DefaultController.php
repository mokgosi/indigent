<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller {

    /**
     * @Route("/", name="dashboard")
     * @Security("has_role('ROLE_ADMIN')") 
     * 
     * Roles ROLE_USER, ROLE_ADMIN
     */
    public function indexAction() {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')
                ->getBarGraphValues();
        
        $entities1 = $em->getRepository('AppBundle:Payment')
                ->getPieGraphValues();
        
        $recents = $em->getRepository('AppBundle:Payment')
                ->getRecent();
        
        
        
        return $this->render('default/index.html.twig', array(
                    'entities' => json_encode($entities),
                    'entities1' => json_encode($entities1),
                    'recents' => $recents,
        ));
    }

}
