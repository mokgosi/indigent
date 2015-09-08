<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Owner;
use AppBundle\Form\OwnerType;

/**
 * Owner controller.
 *
 * @Route("/owner")
 * @Security("has_role('ROLE_ADMIN')") 
 */
class OwnerController extends Controller
{

    /**
     * Lists all Owner entities.
     *
     * @Route("/", name="owner")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Owner')->findAll();

        return $this->render('owner/index.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Creates a new Owner entity.
     *
     * @Route("/", name="owner_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Owner();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            return $this->redirect($this->generateUrl('owner_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('owner'));
        }

        return $this->render('owner/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Owner entity.
     *
     * @param Owner $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Owner $entity)
    {
        $form = $this->createForm(new OwnerType(), $entity, array(
            'action' => $this->generateUrl('owner_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Owner entity.
     *
     * @Route("/new", name="owner_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Owner();
        $form = $this->createCreateForm($entity);

        return $this->render('owner/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Owner entity.
     *
     * @Route("/{id}", name="owner_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Owner')->find($id);
        $erfs = $em->getRepository('AppBundle:Erf')->findByOwnerId($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Owner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('owner/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
                    'erfs' => $erfs
        ));
    }

    /**
     * Displays a form to edit an existing Owner entity.
     *
     * @Route("/{id}/edit", name="owner_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Owner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Owner entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

//        return array(
//            'entity' => $entity,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        );
        return $this->render('owner/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Owner entity.
     *
     * @param Owner $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Owner $entity)
    {
        $form = $this->createForm(new OwnerType(), $entity, array(
            'action' => $this->generateUrl('owner_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Owner entity.
     *
     * @Route("/{id}", name="owner_update")
     * @Method("PUT")
     * @Template("AppBundle:Owner:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Owner')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Owner entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('owner_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Owner entity.
     *
     * @Route("/{id}", name="owner_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Owner')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Owner entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('owner'));
    }

    /**
     * Creates a form to delete a Owner entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('owner_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Lists all Erf entities.
     *
     * @Route("/{id}/find", name="get_erf_owner", options={"expose"=true})
     */
    public function getErfOwnerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Owner')->find($id);

        //json_encode() expects an associative array

        $result = array(
            'firstName' => $entity->getFirstName(),
            'lastName' => $entity->getLastName(),
            'address' => $entity->getAddress(),
            'mobile' => $entity->getMobile(),
        );
        return new JsonResponse($result, 200, array('Content-Type' => 'application/json'));
    }

}
