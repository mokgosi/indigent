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
        
        $recents = $em->getRepository('AppBundle:Payment')
                ->getRecent();
        
        
//        var_dump($entities);
//        die;
        
        return $this->render('default/index.html.twig', array(
                    'entities' => json_encode($entities),
                    'recents' => $recents,
        ));
    }

}
