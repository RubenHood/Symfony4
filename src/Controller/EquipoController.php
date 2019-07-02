<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Equipo;

/**
 * @Route("/equipo")
 */
class EquipoController extends AbstractController
{
    /**
     * @Route("/all", name="listaEquipos")
     */
    public function findAll()
    {
        //recuperamos el entiti manager
        $em = $this->getDoctrine()->getManager();

        //obtenemos la referencia al repositorio
        $repository = $em->getRepository(Equipo::class);

        $equipos = $repository->findAll();

        return $this->render("Equipo/index.html.twig", ["equipos" => $equipos]);
    }
}
