<?php

namespace uriygulak\BlogBundle\Controller;

use uriygulak\BlogBundle\Entity\autor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Autor controller.
 *
 */
class autorController extends Controller
{
    /**
     * Lists all autor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $autors = $em->getRepository('uriygulakBlogBundle:autor')->findAll();

        return $this->render('autor/index.html.twig', array(
            'autors' => $autors,
        ));
    }

    /**
     * Creates a new autor entity.
     *
     */
    public function newAction(Request $request)
    {
        $autor = new Autor();
        $form = $this->createForm('uriygulak\BlogBundle\Form\autorType', $autor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($autor);
            $em->flush();

            return $this->redirectToRoute('autor_show', array('id' => $autor->getId()));
        }

        return $this->render('autor/new.html.twig', array(
            'autor' => $autor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a autor entity.
     *
     */
    public function showAction(autor $autor)
    {
        $deleteForm = $this->createDeleteForm($autor);

        return $this->render('autor/show.html.twig', array(
            'autor' => $autor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing autor entity.
     *
     */
    public function editAction(Request $request, autor $autor)
    {
        $deleteForm = $this->createDeleteForm($autor);
        $editForm = $this->createForm('uriygulak\BlogBundle\Form\autorType', $autor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autor_edit', array('id' => $autor->getId()));
        }

        return $this->render('autor/edit.html.twig', array(
            'autor' => $autor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a autor entity.
     *
     */
    public function deleteAction(Request $request, autor $autor)
    {
        $form = $this->createDeleteForm($autor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($autor);
            $em->flush();
        }

        return $this->redirectToRoute('autor_index');
    }

    /**
     * Creates a form to delete a autor entity.
     *
     * @param autor $autor The autor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(autor $autor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('autor_delete', array('id' => $autor->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
