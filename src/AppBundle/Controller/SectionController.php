<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Section;
use AppBundle\Form\SectionType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Section controller.
 *
 * @Route("/section")
 * @Security("has_role('ROLE_ADMIN')") 
 */
class SectionController extends Controller
{

    /**
     * Lists all Section entities.
     *
     * @Route("/", name="section")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Section')->findAll();

        return $this->render('section/index.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Lists all Section entities.
     *
     * @Route("/ajax", name="get_sections_by_location_id", options={"expose"=true})
     * @Method("GET")
     */
    public function getSectionsByLocationAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        
        // Get the location id
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();

        $sections = $em->getRepository('AppBundle:Section')->findBy(array('locationId' => $id));

        $result = [];
        foreach ($sections as $section) {
            $result[$section->getName()] = $section->getId();
        }

        return new JsonResponse($result);
    }

    /**
     * Creates a new Section entity.
     *
     * @Route("/", name="section_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Section();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('section'));
        }
        
        $errors = $form->getErrors();

        return $this->render('section/new.html.twig', array(
                    'entity' => $entity,
                    'errors' => $errors,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Section entity.
     *
     * @param Section $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Section $entity)
    {
        $form = $this->createForm(new SectionType(), $entity, array(
            'action' => $this->generateUrl('section_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Section entity.
     *
     * @Route("/new", name="section_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Section();
        $form = $this->createCreateForm($entity);
        $errors = $form->getErrors();

        return $this->render('section/new.html.twig', array(
                    'entity' => $entity,
                    'errors' => $errors,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Section entity.
     *
     * @Route("/{id}", name="section_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Section')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Section entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('section/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Section entity.
     *
     * @Route("/{id}/edit", name="section_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Section')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Section entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $errors = $editForm->getErrors();

        return $this->render('section/edit.html.twig', array(
                    'entity' => $entity,
                    'errors' => $errors,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Section entity.
     *
     * @param Section $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Section $entity)
    {
        $form = $this->createForm(new SectionType(), $entity, array(
            'action' => $this->generateUrl('section_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Section entity.
     *
     * @Route("/{id}", name="section_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Section')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Section entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('section'));
        }
        
        $errors = $editForm->getErrors();

        return $this->render('section/edit.html.twig', array(
                    'entity' => $entity,
                    'errors' => $errors,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Section entity.
     *
     * @Route("/{id}", name="section_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Section')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Section entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('section'));
    }

    /**
     * Creates a form to delete a Section entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('section_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
