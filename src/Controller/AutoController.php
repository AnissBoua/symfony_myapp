<?php

namespace App\Controller;

use App\Entity\Auto;
use App\Repository\AutoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Auto::class);
        $autos = $repo->findAll();
        //dd($autos);
        return $this->render('auto/index.html.twig', [
            'autos' => $autos,
        ]);
    }

    /**
     * @Route("/auto/{id}", name="auto_item")
     */
    // public function getAuto($id): Response
    // {
    //     $repo = $this->getDoctrine()->getRepository(Auto::class);
    //     $autos = $repo->find($id);
    //     return $this->render('auto/detail.html.twig', [
    //         'auto' => $autos,
    //     ]);
    // }
    // public function getAuto($id, AutoRepository $repo): Response
    // {
    //     $autos = $repo->find($id);
    //     return $this->render('auto/detail.html.twig', [
    //         'auto' => $autos,
    //     ]);
    // }
    public function getAuto(Auto $auto): Response
    {
        return $this->render('auto/detail.html.twig', [
            'auto' => $auto,
        ]);
    }

    /**
     * @Route("/new", name="auto_new")
     */
    public function createAuto(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $auto = new Auto();
        $auto->setMarque("Ford");
        $auto->setModele("Mustang");
        $auto->setPuissance(180);
        $auto->setPrix(124000);
        $auto->setPays("U.S.A");
        $auto->setImage('/img/cat.jpg');

        $em->persist($auto);
        $em->flush();

        return $this->redirectToRoute('auto');
    }
}
