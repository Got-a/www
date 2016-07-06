<?php

//src/OC/CoreBundle/Controller/ContactController.php

namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'La page de contact n\'est pas encore disponible');
        return $this->redirectToRoute('oc_core_homepage');

        //return $this->render('OCCoreBundle:Contact:contact.html.twig');
    }
}
