<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\Entity\TestPerf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Testperf controller.
 *
 * @Route("testperf")
 */
class TestPerfController extends Controller
{
    /**
     * Lists all testPerf entities.
     *
     * @Route("/", name="testperf_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $testPerves = $em->getRepository('AlterEgoBundle:TestPerf')->findAll();

        return $this->render('testperf/index.html.twig', array(
            'testPerves' => $testPerves,
        ));
    }

    /**
     * Creates a new testPerf entity.
     *
     * @Route("/new", name="testperf_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $testPerf = new Testperf();
        $form = $this->createForm('AlterEgoBundle\Form\TestPerfType', $testPerf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($testPerf);
            $em->flush($testPerf);

            return $this->redirectToRoute('testperf_show', array('id' => $testPerf->getId()));
        }

        return $this->render('testperf/new.html.twig', array(
            'testPerf' => $testPerf,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a testPerf entity.
     *
     * @Route("/{id}", name="testperf_show")
     * @Method("GET")
     */
    public function showAction(TestPerf $testPerf)
    {
        $deleteForm = $this->createDeleteForm($testPerf);

        return $this->render('testperf/show.html.twig', array(
            'testPerf' => $testPerf,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing testPerf entity.
     *
     * @Route("/{id}/edit", name="testperf_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TestPerf $testPerf)
    {
        $deleteForm = $this->createDeleteForm($testPerf);
        $editForm = $this->createForm('AlterEgoBundle\Form\TestPerfType', $testPerf);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('testperf_edit', array('id' => $testPerf->getId()));
        }

        return $this->render('testperf/edit.html.twig', array(
            'testPerf' => $testPerf,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a testPerf entity.
     *
     * @Route("/{id}", name="testperf_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TestPerf $testPerf)
    {
        $form = $this->createDeleteForm($testPerf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($testPerf);
            $em->flush($testPerf);
        }

        return $this->redirectToRoute('testperf_index');
    }

    /**
     * Creates a form to delete a testPerf entity.
     *
     * @param TestPerf $testPerf The testPerf entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TestPerf $testPerf)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('testperf_delete', array('id' => $testPerf->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
