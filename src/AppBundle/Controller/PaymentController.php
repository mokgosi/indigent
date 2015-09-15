<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Payment;
use AppBundle\Form\PaymentType;

/**
 * Payment controller.
 *
 * @Route("/payment")
 * @Security("has_role('ROLE_USER')")
 */
class PaymentController extends Controller
{

    /**
     * Lists all Payment entities.
     *
     * @Route("/", name="payment")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Payment')->findAll();

        return $this->render('payment/index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Creates a new Payment entity.
     *
     * @Route("/", name="payment_create")
     * @Method("POST")
     * @Template("AppBundle:Payment:new.html.twig")
     */
    public function createAction(Request $request)
    {

        $entity = new Payment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $erf = null;
        $errors = null;
        if ($form->isValid()) {
            $data = $request->request->get('appbundle_payment');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $
            $em->flush();
            $balance = $em->getRepository('AppBundle:Payment')
                ->updateCurrentBalance($data['erf'], $data['totalOutstanding']);

            return $this->redirect($this->generateUrl('payment_show', array('id' => $entity->getId())));
        }

        $errors = (string)$form->getErrors(true, true);
        var_dump($form->getErrors(true));
        die;

        return $this->render('payment/new.html.twig', array(
            'entity' => $entity,
            'erf' => $erf,
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * Creates a form to create a Payment entity.
     *
     * @param Payment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Payment $entity)
    {
        $form = $this->createForm(new PaymentType(), $entity, array(
            'action' => $this->generateUrl('payment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Payment entity.
     *
     * @Route("/new", name="payment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        $entity = new Payment();

        $entity->setStaffEmail($this->getUser()->getEmail());

        //these should
        $entity->setAmountDue($this->getParameter('minimum_fee'));
        $entity->setAmountOutstanding($this->getParameter('minimum_fee'));
        $form = $this->createCreateForm($entity);

        return $this->render('payment/new.html.twig', array(
            'entity' => $entity,
            'erf' => array(),
            'errors' => array(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Payment entity.
     *
     * @Route("/new/{id}", name="payment_new_by_erf")
     * @Method({"GET", "POST"})
     */
    public function newByErfAction($id)
    {
        $entity = new Payment();

        $em = $this->getDoctrine()->getManager();

        $erf = $em->getRepository('AppBundle:Erf')->find($id);
        $balance = $em->getRepository('AppBundle:Payment')
            ->getCurrentBalance($id);

        //these should
        $entity->setErf($erf);
        $entity->setStaffEmail($this->getUser()->getEmail());
        $entity->setAmountDue($this->getParameter('minimum_fee'));
        $entity->setAmountOutstanding($this->getParameter('minimum_fee'));
        $entity->setTotalOutstanding($balance->getTotalOutstanding());

        $form = $this->createCreateForm($entity);

        $errors = (string)$form->getErrors(true, false);

        return $this->render('payment/new.html.twig', array(
            'entity' => $entity,
            'erf' => $erf,
            'errors' => $errors,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Payment entity.
     *
     * @Route("/{id}", name="payment_show")
     * @Method("GET")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Payment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('payment/show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Payment entity.
     *
     * @Route("/{id}/edit", name="payment_edit")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Payment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('payment/edit.html.twig', array(
            'entity' => $entity,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Payment entity.
     *
     * @param Payment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Payment $entity)
    {
        $form = $this->createForm(new PaymentType(), $entity, array(
            'action' => $this->generateUrl('payment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Payment entity.
     *
     * @Route("/{id}", name="payment_update")
     * @Method("PUT")
     * @Template("AppBundle:Payment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Payment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('payment_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Payment entity.
     *
     * @Route("/{id}", name="payment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Payment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Payment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('payment'));
    }

    /**
     * Creates a form to delete a Payment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('payment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

}
