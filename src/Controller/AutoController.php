<?php

namespace App\Controller;

use App\Entity\Auto;
use App\Form\AutoType;
use App\Form\ContactType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Service\AutoService;
use App\Repository\AutoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AutoController extends AbstractController
{
    /**
     * @Route("/auto", name="auto")
     */
    public function index(PaginatorInterface $paginator, Request $request, SessionInterface $session): Response
    {
        $repo = $this->getDoctrine()->getRepository(Auto::class);

        $cars = $repo->findBy(['puissance'=>501], ['id'=>'DESC']);
        $session->set('cars', $cars);
        
        $autosData = $repo->findAll();
        $autosPagination = $paginator->paginate($autosData, $request->query->getInt('page', 1));
        //dd($autos);
        return $this->render('auto/index.html.twig', [
            'autos' => $autosPagination
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
    public function createAuto(Request $request): Response
    {
        if ($request->request->get('puissance')) {
            //dd($request->get('marque'));
            $em = $this->getDoctrine()->getManager();

            $auto = new Auto();
            $auto->setMarque($request->get('marque'));
            $auto->setModele($request->get('modele'));
            $auto->setPuissance($request->get('puissance'));
            $auto->setPrix($request->get('prix'));
            $auto->setPays($request->get('pays'));
            $auto->setImage($request->get('image'));

            $em->persist($auto);
            $em->flush();

            return $this->redirectToRoute("auto");
        }

        return $this->render('auto/add.html.twig', []);
    }

    /**
     * @Route("/add", name="auto_add")
     */
    public function addAuto(Request $request, EntityManagerInterface $em, AutoService $autoService): Response
    {
        $auto = new Auto();
        $formAuto = $this->createFormBuilder($auto)
            ->add('marque', TextType::class, ['label' => 'marque de la viture', 'attr' => ['placeholder' => 'entrez la marque svp']])
            ->add('modele')
            ->add('puissance')
            ->add('prix', MoneyType::class)
            ->add('pays')
            ->add('image', FileType::class)
            ->add('submit', SubmitType::class)
            ->getForm();
        $formAuto->handleRequest($request);

        if ($formAuto->isSubmitted() && $formAuto->isValid()) {
            $image_directory = $this->getParameter('images_directory');
            $fileName = $autoService->uploadImage($formAuto, $image_directory);
            // $file = $formAuto->get('image')->getData();
            // $fileName = time() . '.' . $file->guessExtension();
            // $file->move($this->getParameter('images_directory'), $fileName);
            $auto->setImage($fileName);
            // dd($file);
            $em->persist($auto);
            $em->flush();
            $this->addFlash('success', 'Car added succesfully');
            return $this->redirectToRoute("auto");
        }
        return $this->render('auto/addcar.html.twig', [
            'form_car' => $formAuto->createView(),
        ]);
    }

    /**
     * @Route("/auto/edit/{id}", name="auto_update")
     */
    public function updateAuto($id, Request $request): Response
    {
        
        $em = $this->getDoctrine()->getManager();
        $auto = $em->getRepository(Auto::class)->find($id);

        $form_update = $this->createForm(AutoType::class, $auto);
        if (!$auto) {
            throw $this->createNotFoundException('There are no car with this id ' . $id);
        }
        $oldFileName = $auto->getImage();
        $form_update->handleRequest($request);
        if ($form_update->isSubmitted() && $form_update->isValid()) {
            $fileSystem = new Filesystem;
            $file = $form_update->get('image')->getData();
            //$fileName = time() . '.' . $file->guessExtension();
            $fileName = "";
            if ($file) {
                $fileName = time() . '.' . $file->guessExtension();
                $file->move($this->getParameter('images_directory'), $fileName);
                if (file_exists('img/' . $oldFileName)) {
                    
                    $fileSystem->remove('img/' . $oldFileName);
                    
                }
                //$em->remove($auto);
                $auto->setImage($fileName);
            }else{
                $auto->setImage($oldFileName);
            }

            $em->flush();
            return $this->redirectToRoute("auto", ['id' => $auto->getId()]);
        }

        return $this->render('auto/update.html.twig', ['form_update' => $form_update->createView(), 'auto' => $auto]);

        // $auto->setMarque('Peugeot');
        // $em->flush();

        // return $this->redirectToRoute('auto', ['id' => $auto->getId()]);
    }

    /**
     * @Route("/delete/{id}", name="auto_delete")
     */
    public function deleteAuto($id): Response
    {
        $fileSystem = new Filesystem;
        $em = $this->getDoctrine()->getManager();
        $auto = $em->getRepository(Auto::class)->find($id);

        if (!$auto) {
            throw $this->createNotFoundException('There are no car with this id ' . $id);
        }
        if (file_exists('img/' . $auto->getImage())) {
            $fileSystem->remove('img/' . $auto->getImage());
        }
        $em->remove($auto);
        $em->flush();

        return $this->redirectToRoute('auto');
    }

    /**
     * @Route("/sendmail", name="sendmail")
     */
    public function sendMail()
    {
        $form_contact = $this->createForm(ContactType::class);

        return $this->render('auto/contact.html.twig', ['formContact'=>$form_contact->createView()]);
        # code...
    }

    /**
     * @Route("/email", name="testmail")
     */
    public function Email(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('anisbouainbi@gmail.com')
            ->to('anisbouainbi@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);
        
        return new Response('the email have been sent');
        
    }
}
