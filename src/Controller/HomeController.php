<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAction()
    {

        return new Response(
            '<html><body>Lucky number: hola </body></html>'
        );
        // return $this->render('@Backend/Default/index.html.twig');
    }
}
