<?php

namespace Jh\Bundle\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jh\Bundle\JobBundle\Entity\Province;
use Jh\Bundle\JobBundle\Form\ProvinceType;

/**
 * Province controller.
 *
 * @Route("/province")
 */
class ProvinceController extends Controller
{
    /**
     * Lists all Province entities.
     *
     * @Route("/", name="province")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JhJobBundle:Province')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Province entity.
     *
     * @Route("/{id}/show", name="province_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Province entity.
     *
     * @Route("/new", name="province_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Province();
        $form   = $this->createForm(new ProvinceType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Province entity.
     *
     * @Route("/create", name="province_create")
     * @Method("post")
     * @Template("JhJobBundle:Province:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Province();
        $request = $this->getRequest();
        $form    = $this->createForm(new ProvinceType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('province_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Province entity.
     *
     * @Route("/{id}/edit", name="province_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $editForm = $this->createForm(new ProvinceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Province entity.
     *
     * @Route("/{id}/update", name="province_update")
     * @Method("post")
     * @Template("JhJobBundle:Province:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $editForm   = $this->createForm(new ProvinceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('province_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Province entity.
     *
     * @Route("/{id}/delete", name="province_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JhJobBundle:Province')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Province entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('province'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
