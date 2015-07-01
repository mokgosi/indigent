<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     * @Security("has_role('ROLE_ADMIN')") 
     * 
     * Roles ROLE_USER, ROLE_ADMIN
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
