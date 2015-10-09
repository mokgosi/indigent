<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Erf;
use AppBundle\Form\ErfType;

/**
 * Erf controller.
 *
 * @Route("/erf")
 * @Security("has_role('ROLE_USER')") 
 */
class ErfController extends Controller {

    /**
     * Lists all Erf entities.
     *
     * @Route("/", name="erf")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Erf')->findAll();

        return $this->render('erf/index.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Creates a new Erf entity.
     *
     * @Route("/", name="erf_create")
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $entity = new Erf();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            return $this->redirect($this->generateUrl('erf_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('erf'));
        }

        return $this->render('erf/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Erf entity.
     *
     * @param Erf $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Erf $entity) {
        $form = $this->createForm(new ErfType(), $entity, array(
            'action' => $this->generateUrl('erf_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Erf entity.
     *
     * @Route("/new", name="erf_new")
     * @Method("GET")
     */
    public function newAction() {
        $entity = new Erf();
        $form = $this->createCreateForm($entity);

        return $this->render('erf/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Erf entity.
     *
     * @Route("/{id}", name="erf_show")
     * @Method("GET")
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Erf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Erf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('erf/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Erf entity.
     *
     * @Route("/{id}/edit", name="erf_edit")
     * @Method("GET")
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Erf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Erf entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('erf/edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Erf entity.
     *
     * @param Erf $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Erf $entity) {
        $form = $this->createForm(new ErfType(), $entity, array(
            'action' => $this->generateUrl('erf_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Erf entity.
     *
     * @Route("/{id}", name="erf_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Erf')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Erf entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('erf'));
        }

        return $this->render('erf/edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Erf entity.
     *
     * @Route("/{id}", name="erf_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Erf')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Erf entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('erf'));
    }

    /**
     * Creates a form to delete a Erf entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('erf_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Lists all Erf entities.
     *
     * @Route("/{id}/find", name="erf_get_by_id", options={"expose"=true})
     */
    public function getErfByIdAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Erf')->find($id);
        dump($entity);
        //json_encode() expects an associative array

        $result = array(
            'street' => $entity->getAddress(),
            'section' => $entity->getSection()->getName(),
            'location' => $entity->getLocation()->getName(),
            'type' => $entity->getErfType()->getName(),
            'balance' => $entity->getBalance(),
            'first_name' => $entity->getOwner()->getFirstName(),
            'last_name' => $entity->getOwner()->getLastName(),
        );
        return new JsonResponse($result, 200, array('Content-Type' => 'application/json'));
    }
    
//    public function getSectionsByLocation 
  

}
