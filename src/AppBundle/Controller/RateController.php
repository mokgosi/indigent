<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Rate;
use AppBundle\Form\RateType;

/**
 * Rate controller.
 *
 * @Route("/rate")
 */
class RateController extends Controller
{

    /**
     * Lists all Rate entities.
     *
     * @Route("/", name="rate")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Rate')->findAll();

        return $this->render('rate/index.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Creates a new Rate entity.
     *
     * @Route("/", name="rate_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Rate();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rate'));
        }

        return $this->render('rate/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rate entity.
     *
     * @param Rate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rate $entity)
    {
        $form = $this->createForm(new RateType(), $entity, array(
            'action' => $this->generateUrl('rate_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rate entity.
     *
     * @Route("/new", name="rate_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Section();
        $form = $this->createCreateForm($entity);

        return $this->render('rate/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rate entity.
     *
     * @Route("/{id}", name="rate_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Rate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('rate/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rate entity.
     *
     * @Route("/{id}/edit", name="rate_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Rate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rate entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('rate/edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Rate entity.
     *
     * @param Rate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Rate $entity)
    {
        $form = $this->createForm(new RateType(), $entity, array(
            'action' => $this->generateUrl('rate_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Rate entity.
     *
     * @Route("/{id}", name="rate_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Rate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rate'));
        }

        return $this->render('rate/edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rate entity.
     *
     * @Route("/{id}", name="rate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Rate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rate entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('section'));
    }

    /**
     * Creates a form to delete a Rate entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('rate_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
