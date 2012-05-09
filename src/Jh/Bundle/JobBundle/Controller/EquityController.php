<?php

namespace Jh\Bundle\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jh\Bundle\JobBundle\Entity\Equity;
use Jh\Bundle\JobBundle\Form\EquityType;

/**
 * Equity controller.
 *
 * @Route("/equity")
 */
class EquityController extends Controller
{
    /**
     * Lists all Equity entities.
     *
     * @Route("/", name="equity")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JhJobBundle:Equity')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Equity entity.
     *
     * @Route("/{id}/show", name="equity_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Equity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equity entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Equity entity.
     *
     * @Route("/new", name="equity_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Equity();
        $form   = $this->createForm(new EquityType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Equity entity.
     *
     * @Route("/create", name="equity_create")
     * @Method("post")
     * @Template("JhJobBundle:Equity:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Equity();
        $request = $this->getRequest();
        $form    = $this->createForm(new EquityType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('equity_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Equity entity.
     *
     * @Route("/{id}/edit", name="equity_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Equity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equity entity.');
        }

        $editForm = $this->createForm(new EquityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Equity entity.
     *
     * @Route("/{id}/update", name="equity_update")
     * @Method("post")
     * @Template("JhJobBundle:Equity:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JhJobBundle:Equity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equity entity.');
        }

        $editForm   = $this->createForm(new EquityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('equity_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Equity entity.
     *
     * @Route("/{id}/delete", name="equity_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JhJobBundle:Equity')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Equity entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('equity'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
