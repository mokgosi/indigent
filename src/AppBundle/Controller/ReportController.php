<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
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
    public function erfReportAction(Request $request)
    {
        $form = $this->get('form.factory')->createNamedBuilder('', 'form', array(), array(
                    'action' => $this->generateUrl('report_erf'),
                    'method' => 'GET',
                    'csrf_protection' => false,
                    'attr' => array('name' => 'search'),))
                ->add('query', 'text', array('required' => false,))
                ->add('datefrom', 'text', array('required' => false,))
                ->add('dateto', 'text', array('required' => false,))
                ->add('submit', 'submit')
                ->getForm();

        $form->handleRequest($request);
        
        $erf = null;
        $entities = null;
        $graph = null;

        if ($form->isValid()) {

            $data = $form->getData();
            
            if (!$data['datefrom']) {
                $d = new \DateTime('first day of this month');
                $data['datefrom'] = $d->format('Y-m-d');
            }
            if (!$data['dateto']) {
                $dt = new \DateTime();
                $data['dateto'] = $dt->format('Y-m-d');
            }
            
            $em = $this->getDoctrine()->getManager();

            $erf = $em ->getRepository('AppBundle:Erf')->findOneBy(array('erfNo'=>$data['query']));
            

            $entities = $em->getRepository('AppBundle:Payment')->getErfReport($data['query'], $data['datefrom'], $data['dateto']);
            dump($entities);

        }

        return $this->render('report/erf.html.twig', array(
                'form' => $form->createView(),
                'entities' => $entities,
                'graph' => json_encode($graph),
                'erf' => $erf,
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/section", name="report_section")
     * @Method("GET")
     */
    public function sectionReportAction(Request $request)
    {
        $section = null;
        $entities = null;
        $graph = null;

        $form = $this->get('form.factory')->createNamedBuilder('', 'form', array(), array(
                    'action' => $this->generateUrl('report_section'),
                    'method' => 'GET',
                    'csrf_protection' => false,
                    'attr' => array('name' => 'search'),))
                ->add('location', 'entity', array(
                    'class' => 'AppBundle:Location',
                    'property' => 'name'))
                ->add('section', 'entity', array(
                    'class' => 'AppBundle:Section',
                    'property' => 'name'))
                ->add('datefrom', 'text', array('required' => false,))
                ->add('dateto', 'text', array('required' => false,))
                ->add('submit', 'submit')
                ->getForm();

        $form->handleRequest($request);
        
        if ($form->isValid()) {

            $data = $form->getData();
            
            if (!$data['datefrom']) {
                $d = new \DateTime('first day of this month');
                $data['datefrom'] = $d->format('Y-m-d');
            }
            if (!$data['dateto']) {
                $dt = new \DateTime();
                $data['dateto'] = $dt->format('Y-m-d');
            }
            
            $em = $this->getDoctrine()->getManager();

            $section = $em ->getRepository('AppBundle:Section')->findOneBy(array('id'=>$data['section']));

            $entities = $em->getRepository('AppBundle:Payment')->getSectionReport($data['section'], $data['datefrom'], $data['dateto']);
            $graph = $em->getRepository('AppBundle:Payment')->getSectionBarGraph($data['section']);

        }        


        return $this->render('report/section.html.twig', array(
                    'entities' => $entities,
                    'section' => $section,
                    'graph' => json_encode($graph),
                    'form' => $form->createView()
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/location", name="report_location")
     * @Method("GET")
     */
    public function locationReportAction(Request $request)
    {
        $location = null;
        $entities = null;
        $graph = null;

        $form = $this->get('form.factory')->createNamedBuilder('', 'form', array(), array(
            'action' => $this->generateUrl('report_location'),
            'method' => 'GET',
            'csrf_protection' => false,
            'attr' => array('name' => 'search'),))
            ->add('location', 'entity', array(
                'class' => 'AppBundle:Location',
                'property' => 'name'))
            ->add('datefrom', 'text', array('required' => false,))
            ->add('dateto', 'text', array('required' => false,))
            ->add('submit', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();

            if (!$data['datefrom']) {
                $d = new \DateTime('first day of this month');
                $data['datefrom'] = $d->format('Y-m-d');
            }
            if (!$data['dateto']) {
                $dt = new \DateTime();
                $data['dateto'] = $dt->format('Y-m-d');
            }

            $em = $this->getDoctrine()->getManager();

            $location = $em->getRepository('AppBundle:Location')->findOneBy(array('id' => $data['location']));
            $entities = $em->getRepository('AppBundle:Payment')->getLocationReport($data['location'], $data['datefrom'], $data['dateto']);
            $graph = $em->getRepository('AppBundle:Payment')->getLocationGraphReport($data['location'], $data['datefrom'], $data['dateto']);
        }

        return $this->render('report/location.html.twig', array(
            'location' => $location,
            'entities' => $entities,
            'graph' => json_encode($graph),
            'form' => $form->createView(),
        ));
    }

    /**
     * Lists all Payment entities.
     *
     * @Route("/checkout", name="report_checkout")
     * @Method("GET")
     */
    public function checkoutAction() 
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')->checkout($this->getUser()->getEmail());

        return $this->render('report/checkout.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
 
}
