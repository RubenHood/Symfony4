<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Equipo;
use App\Form\EquipoType;

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

    /**
     * @Route("/new", name="newEquipos")
     */
    public function nuevoEquipo(Request $request)
    {
        //instanciamos un objeto equipo
        $equipo = new Equipo();

        //creamos el form a partir de la entidad y la clase EquipoType de Forms
        $form = $this->createForm(EquipoType::class, $equipo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $equipo = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($equipo);
            $em->flush();

            return $this->redirectToRoute('listaEquipos');
        }

        return $this->render('equipo/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/update", name="updateEquipos")
     */
    public function actualizaEquipo(Request $request, $id = null)
    {
        //recuperamos el entiti manager
        $em = $this->getDoctrine()->getManager();

        //obtenemos la referencia al repositorio
        $repository = $em->getRepository(Equipo::class);

        //buscamos un equipo a partir del id
        $equipo = $repository->find($id);

        //creamos el form a partir de la entidad y la clase EquipoType de Forms
        $form = $this->createForm(EquipoType::class, $equipo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $equipo = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($equipo);
            $em->flush();

            return $this->redirectToRoute('listaEquipos');
        }

        return $this->render('equipo/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
