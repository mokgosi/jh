<?php

namespace Jh\Bundle\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jh\Bundle\JobBundle\Entity\Suburb;
use Jh\Bundle\JobBundle\Form\SuburbType;

/**
 * Suburb controller.
 *
 * @Route("/suburb")
 */
class SuburbController extends Controller
{
    /**
     * Lists all Suburb entities.
     *
     * @Route("/", name="suburb")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JhJobBundle:Suburb')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Suburb entity.
     *
     * @Route("/{id}/show", name="suburb_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Suburb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Suburb entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Suburb entity.
     *
     * @Route("/new", name="suburb_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Suburb();
        $form   = $this->createForm(new SuburbType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Suburb entity.
     *
     * @Route("/create", name="suburb_create")
     * @Method("post")
     * @Template("JhJobBundle:Suburb:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Suburb();
        $request = $this->getRequest();
        $form    = $this->createForm(new SuburbType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('suburb_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Suburb entity.
     *
     * @Route("/{id}/edit", name="suburb_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Suburb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Suburb entity.');
        }

        $editForm = $this->createForm(new SuburbType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Suburb entity.
     *
     * @Route("/{id}/update", name="suburb_update")
     * @Method("post")
     * @Template("JhJobBundle:Suburb:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Suburb')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Suburb entity.');
        }

        $editForm   = $this->createForm(new SuburbType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('suburb_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Suburb entity.
     *
     * @Route("/{id}/delete", name="suburb_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JhJobBundle:Suburb')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Suburb entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('suburb'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
