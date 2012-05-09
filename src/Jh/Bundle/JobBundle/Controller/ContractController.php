<?php

namespace Jh\Bundle\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jh\Bundle\JobBundle\Entity\Contract;
use Jh\Bundle\JobBundle\Form\ContractType;

/**
 * Contract controller.
 *
 * @Route("/contract")
 */
class ContractController extends Controller
{
    /**
     * Lists all Contract entities.
     *
     * @Route("/", name="contract")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JhJobBundle:Contract')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Contract entity.
     *
     * @Route("/{id}/show", name="contract_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Contract')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contract entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Contract entity.
     *
     * @Route("/new", name="contract_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Contract();
        $form   = $this->createForm(new ContractType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Contract entity.
     *
     * @Route("/create", name="contract_create")
     * @Method("post")
     * @Template("JhJobBundle:Contract:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Contract();
        $request = $this->getRequest();
        $form    = $this->createForm(new ContractType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contract_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Contract entity.
     *
     * @Route("/{id}/edit", name="contract_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Contract')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contract entity.');
        }

        $editForm = $this->createForm(new ContractType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Contract entity.
     *
     * @Route("/{id}/update", name="contract_update")
     * @Method("post")
     * @Template("JhJobBundle:Contract:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Contract')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contract entity.');
        }

        $editForm   = $this->createForm(new ContractType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contract_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Contract entity.
     *
     * @Route("/{id}/delete", name="contract_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JhJobBundle:Contract')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contract entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contract'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
