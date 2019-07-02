<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function indexAction()
    {

        return $this->render('templates/home/index.html.twig');
    }
}
