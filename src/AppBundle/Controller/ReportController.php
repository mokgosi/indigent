<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Payment controller.
 *
 * @Route("/report")
 * @Security("has_role('ROLE_ADMIN')") 
 */
class ReportController extends Controller
{

    /**
     * Lists all Payment entities.
     *
     * @Route("/erf", name="report_erf")
     * @Method("GET")
     */
    public function erfReportAction()
    {
        return $this->render('report/erf.html.twig', array(
                    'entities' => ''
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/section", name="report_section")
     * @Method("GET")
     */
    public function sectionReportAction()
    {
        return $this->render('report/section.html.twig', array(
                    'entities' => ''
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/location", name="report_location")
     * @Method("GET")
     */
    public function locationReportAction()
    {
        return $this->render('report/location.html.twig', array(
                    'entities' => ''
        ));
    }

}
