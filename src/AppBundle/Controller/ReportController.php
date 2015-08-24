<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Payment controller.
 *
 * @Route("/report")
 */
class ReportController extends Controller
{

    /**
     * Lists all Payment entities.
     *
     * @Route("/", name="report")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')->findAll();

        return $this->render('report/index.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/section/{id}", name="report_section")
     * @Method("GET")
     */
    public function getSectionReportAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')->getSectionReport($id);

        return $this->render('report/section.html.twig', array(
                    'entities' => $entities
        ));
    }

    /***
     * @Route("/")
     */
    public function getErfTransactionHistory()
    {
        
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/section", name="report_sections")
     * @Method("GET")
     */
    public function sectionReportAction()
    {
        return new Response;
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/erf", name="report_erf")
     * @Method("GET")
     */
    public function erfReportAction($id)
    {

        return new Response;
    }

}
