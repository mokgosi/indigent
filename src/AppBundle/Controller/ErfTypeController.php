<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\ErfType;
use AppBundle\Form\ErfTypeType;

/**
 * ErfType controller.
 *
 * @Route("/erftype")
 * @Security("has_role('ROLE_ADMIN')") 
 */
class ErfTypeController extends Controller
{

    /**
     * Lists all ErfType entities.
     *
     * @Route("/", name="erftype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:ErfType')->findAll();

        return $this->render('erftype/index.html.twig', array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new ErfType entity.
     *
     * @Route("/", name="erftype_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new ErfType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            return $this->redirect($this->generateUrl('erftype_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('erftype'));
        }

        return $this->render('erftype/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ErfType entity.
     *
     * @param ErfType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ErfType $entity)
    {
        $form = $this->createForm(new ErfTypeType(), $entity, array(
            'action' => $this->generateUrl('erftype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ErfType entity.
     *
     * @Route("/new", name="erftype_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new ErfType();
        $form   = $this->createCreateForm($entity);

        return $this->render('erftype/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ErfType entity.
     *
     * @Route("/{id}", name="erftype_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ErfType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ErfType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
       
        return $this->render('erftype/show.html.twig', array(
            'entity' => $entity,
            'delete_form'   => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ErfType entity.
     *
     * @Route("/{id}/edit", name="erftype_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ErfType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ErfType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('erftype/edit.html.twig', array(
            'entity' => $entity,
            'form'   => $editForm->createView(),
        ));

    }

    /**
    * Creates a form to edit a ErfType entity.
    *
    * @param ErfType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ErfType $entity)
    {
        $form = $this->createForm(new ErfTypeType(), $entity, array(
            'action' => $this->generateUrl('erftype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ErfType entity.
     *
     * @Route("/{id}", name="erftype_update")
     * @Method("PUT")
     * @Template("AppBundle:ErfType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:ErfType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ErfType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('erftype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ErfType entity.
     *
     * @Route("/{id}", name="erftype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:ErfType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ErfType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('erftype'));
    }

    /**
     * Creates a form to delete a ErfType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('erftype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
