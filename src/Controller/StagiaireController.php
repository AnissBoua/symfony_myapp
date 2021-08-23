<?php

namespace App\Controller;

use App\Form\StageType;
use App\Entity\Stagiaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StagiaireController extends AbstractController
{
    /**
     * @Route("/stagiaire", name="stage")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Stagiaire::class);
        $stagiares = $repo->findAll();
        return $this->render('stagiaire/index.html.twig', [
            'stagiaires' => $stagiares,
        ]);
    }

    /**
     * @Route("/stage/add", name="add_stage")
     */
    public function addStage(Request $request): Response
    {
        // if($request->request->get('puissance')){
        //     dd($request->get('marque'));
        //     $em = $this->getDoctrine()->getManager();

        //     $stagiares = new Stagiaire();
        //     $stagiares->setNom($request->get('nom'));
        //     $stagiares->setPrenom($request->get('prenom'));
        //     $stagiares->setTelephone($request->get('phone'));
        //     $stagiares->setAdresse($request->get('adresse'));
        //     $stagiares->setDiplome($request->get('diplome'));
        //     $stagiares->setDateNaiss($request->get('date_naiss'));
        //     $stagiares->setContrat($request->get('contrat'));
        //     $stagiares->setPhoto($request->get('photo'));
        //     $stagiares->setDescription($request->get('description'));

        //     $em->persist($stagiares);
        //     $em->flush();

        //     return $this->redirectToRoute("stage");
        // }

        // return $this->render('stagiaire/add.html.twig', [
        // ]);

        // $stagiares = new Stagiaire();
        // $formStage = $this->createFormBuilder($stagiares)
        //                     ->add('nom', TextType::class, ['label'=>'Nom', 'attr'=> ['placeholder'=>'Entrez votre Nom svp']])
        //                     ->add('prenom')
        //                     ->add('telephone')
        //                     ->add('adresse')
        //                     ->add('diplome', CheckboxType::class)
        //                     ->add('date_naiss')
        //                     ->add('contrat')
        //                     ->add('description', TextType::class)
        //                     ->add('submit', SubmitType::class)
        //                     ->getForm();
        // $formStage->handleRequest($request);

        // if($formStage->isSubmitted() && $formStage->isValid()){

        //     $em->persist($stagiares);
        //     $em->flush();
        //     return $this->redirectToRoute("stage");
        // }
        // return $this->render('stagiaire/add.html.twig', [ 'form_stage'=>$formStage->createView(),
        // ]);

        $em = $this->getDoctrine()->getManager();
        $stage = new Stagiaire;
        
        $form_add = $this->createForm(StageType::class, $stage);
        $form_add->handleRequest($request);
        if($form_add->isSubmitted() && $form_add->isValid()){
            
            $em->persist($stage);
            $em->flush();

            return $this->redirectToRoute("stage");
        }

        return $this->render('stagiaire/add.html.twig', ['form_add'=>$form_add->createView()]);
    }

}
