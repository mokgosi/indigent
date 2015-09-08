<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\PaymentAllocation;
use AppBundle\Form\PaymentAllocationType;

/**
 * PaymentAllocation controller.
 *
 * @Route("/paymentallocation")
 * @Security("has_role('ROLE_ADMIN')") 
 */
class PaymentAllocationController extends Controller
{

    /**
     * Lists all PaymentAllocation entities.
     *
     * @Route("/", name="paymentallocation")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:PaymentAllocation')->findAll();

        $checks = $em->getRepository('AppBundle:Section')->findAll();

        return $this->render('allocations/index.html.twig', array(
                    'entities' => $entities,
                    'sections' => $checks
        ));
    }

    /**
     * Creates a new PaymentAllocation entity.
     *
     * @Route("/", name="paymentallocation_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new PaymentAllocation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            return $this->redirect($this->generateUrl('paymentallocations_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('paymentallocation'));
        }

        return $this->render('allocations/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PaymentAllocation entity.
     *
     * @param PaymentAllocation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PaymentAllocation $entity)
    {
        $form = $this->createForm(new PaymentAllocationType(), $entity, array(
            'action' => $this->generateUrl('paymentallocation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PaymentAllocation entity.
     *
     * @Route("/new", name="paymentallocation_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new PaymentAllocation();
        $form = $this->createCreateForm($entity);

        return $this->render('allocations/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PaymentAllocation entity.
     *
     * @Route("/{id}", name="paymentallocation_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PaymentAllocation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentAllocation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('allocations/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PaymentAllocation entity.
     *
     * @Route("/{id}/edit", name="paymentallocation_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PaymentAllocation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentAllocation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('allocations/edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a PaymentAllocation entity.
     *
     * @param PaymentAllocation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PaymentAllocation $entity)
    {
        $form = $this->createForm(new PaymentAllocationType(), $entity, array(
            'action' => $this->generateUrl('paymentallocation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PaymentAllocation entity.
     *
     * @Route("/{id}", name="paymentallocation_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:PaymentAllocation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PaymentAllocation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

//            return $this->redirect($this->generateUrl('paymentallocation_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('paymentallocation'));
        }

        return $this->render('allocations/edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PaymentAllocation entity.
     *
     * @Route("/{id}", name="paymentallocation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:PaymentAllocation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PaymentAllocation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('paymentallocation'));
    }

    /**
     * Creates a form to delete a PaymentAllocation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('paymentallocation_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

     /**
     * Reallocats PaymentAllocations.
     *
     * @Route("/{id}/reallocation", name="paymentallocation_reallocation", options={"expose"=true})
     * @Method("GET")
     */
    public function allocateSectionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->getRepository('AppBundle:PaymentAllocation')->deleteByMonth('September');

        $em->getRepository('AppBundle:PaymentAllocation')->allocateBySection($id);
        
        return $this->redirect($this->generateUrl('paymentallocation'));
        
    }


}
