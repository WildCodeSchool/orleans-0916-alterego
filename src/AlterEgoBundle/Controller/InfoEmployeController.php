<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\Entity\InfosEmploye;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Infoemploye controller.
 *
 * @Route("infoemploye")
 */
class InfoEmployeController extends Controller
{
    /**
     * Lists all infoEmploye entities.
     *
     * @Route("/", name="infoemploye_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $infoEmployes = $em->getRepository('AlterEgoBundle:InfoEmploye')->findAll();

        return $this->render('infoemploye/index.html.twig', array(
            'infoEmployes' => $infoEmployes,
        ));
    }

    /**
     * Creates a new infoEmploye entity.
     *
     * @Route("/new", name="infoemploye_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $infoEmploye = new Infoemploye();
        $form = $this->createForm('AlterEgoBundle\Form\InfoEmployeType', $infoEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infoEmploye);
            $em->flush($infoEmploye);

            return $this->redirectToRoute('infoemploye_show', array('id' => $infoEmploye->getId()));
        }

        return $this->render('infoemploye/new.html.twig', array(
            'infoEmploye' => $infoEmploye,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a infoEmploye entity.
     *
     * @Route("/{id}", name="infoemploye_show")
     * @Method("GET")
     */
    public function showAction(InfoEmploye $infoEmploye)
    {
        $deleteForm = $this->createDeleteForm($infoEmploye);

        return $this->render('infoemploye/show.html.twig', array(
            'infoEmploye' => $infoEmploye,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing infoEmploye entity.
     *
     * @Route("/{id}/edit", name="infoemploye_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InfoEmploye $infoEmploye)
    {
        $deleteForm = $this->createDeleteForm($infoEmploye);
        $editForm = $this->createForm('AlterEgoBundle\Form\InfoEmployeType', $infoEmploye);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('infoemploye_edit', array('id' => $infoEmploye->getId()));
        }

        return $this->render('infoemploye/edit.html.twig', array(
            'infoEmploye' => $infoEmploye,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a infoEmploye entity.
     *
     * @Route("/{id}", name="infoemploye_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InfoEmploye $infoEmploye)
    {
        $form = $this->createDeleteForm($infoEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infoEmploye);
            $em->flush($infoEmploye);
        }

        return $this->redirectToRoute('infoemploye_index');
    }

    /**
     * Creates a form to delete a infoEmploye entity.
     *
     * @param InfoEmploye $infoEmploye The infoEmploye entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InfoEmploye $infoEmploye)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('infoemploye_delete', array('id' => $infoEmploye->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
