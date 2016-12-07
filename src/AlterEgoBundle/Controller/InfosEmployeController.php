<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\Entity\InfosEmploye;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Infosemploye controller.
 *
 * @Route("infosemploye")
 */
class InfosEmployeController extends Controller
{
    /**
     * Lists all infosEmploye entities.
     *
     * @Route("/", name="infosemploye_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $infosEmployes = $em->getRepository('AlterEgoBundle:InfosEmploye')->findAll();

        return $this->render('infosemploye/index.html.twig', array(
            'infosEmployes' => $infosEmployes,
        ));
    }

    /**
     * Creates a new infosEmploye entity.
     *
     * @Route("/new", name="infosemploye_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $infosEmploye = new Infosemploye();
        $form = $this->createForm('AlterEgoBundle\Form\InfosEmployeType', $infosEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infosEmploye);
            $em->flush($infosEmploye);

            return $this->redirectToRoute('infosemploye_show', array('id' => $infosEmploye->getId()));
        }

        return $this->render('infosemploye/new.html.twig', array(
            'infosEmploye' => $infosEmploye,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a infosEmploye entity.
     *
     * @Route("/{id}", name="infosemploye_show")
     * @Method("GET")
     */
    public function showAction(InfosEmploye $infosEmploye)
    {
        $deleteForm = $this->createDeleteForm($infosEmploye);

        return $this->render('infosemploye/show.html.twig', array(
            'infosEmploye' => $infosEmploye,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing infosEmploye entity.
     *
     * @Route("/{id}/edit", name="infosemploye_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InfosEmploye $infosEmploye)
    {
        $deleteForm = $this->createDeleteForm($infosEmploye);
        $editForm = $this->createForm('AlterEgoBundle\Form\InfosEmployeType', $infosEmploye);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('infosemploye_edit', array('id' => $infosEmploye->getId()));
        }

        return $this->render('infosemploye/edit.html.twig', array(
            'infosEmploye' => $infosEmploye,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a infosEmploye entity.
     *
     * @Route("/{id}", name="infosemploye_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InfosEmploye $infosEmploye)
    {
        $form = $this->createDeleteForm($infosEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infosEmploye);
            $em->flush($infosEmploye);
        }

        return $this->redirectToRoute('infosemploye_index');
    }

    /**
     * Creates a form to delete a infosEmploye entity.
     *
     * @param InfosEmploye $infosEmploye The infosEmploye entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InfosEmploye $infosEmploye)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('infosemploye_delete', array('id' => $infosEmploye->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
