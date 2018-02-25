<?php

namespace uriygulak\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Import new namespaces
use Symfony\Component\HttpFoundation\Request;
use uriygulak\BlogBundle\Entity\Enquiry;
use uriygulak\BlogBundle\Form\EnquiryType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('home.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('uriygulakBlogBundle:Default:about.html.twig');
    }

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();

        $form = $this->createForm(EnquiryType::class, $enquiry);

        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('uriygulak_blog_contact'));
            }
        }

        return $this->render('uriygulakBlogBundle::contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
