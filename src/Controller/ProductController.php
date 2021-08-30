<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $repo, SessionInterface $session): Response
    {
        $categories = $repo->findAll();
        $session->set('category', $categories);
        //dd($session->get('category'));
        $name = 'Anis';
        $days = ['Monday', 'Friday'];
        $products = [["name" => "shoes", "price"=>20, 'avaible'=>true],
                    ["name" => "t-shirt", "price"=>15, 'avaible'=>true]];
        $posts = [
            ["id" => 1, "title"=>"Article1", "image"=>"image1.jpg", "description"=>"Description1", "date_parution"=>"12/12/2015" ],
            ["id" => 2, "title"=>"Article2", "image"=>"image2.jpg", "description"=>"Description2", "date_parution"=>"12/12/2020" ],
            ["id" => 3, "title"=>"Article3", "image"=>"image3.jpg", "description"=>"Description3", "date_parution"=>"11/12/2015" ],
            ["id" => 4, "title"=>"Article4", "image"=>"image4.jpg", "description"=>"Description4", "date_parution"=>"12/12/2021" ],
        ];
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController', 'name' => $name, 'days' => $days, 'listProduct' => $products, 'posts' => $posts,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response{
        
        return $this->render('product/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response{
        
        return $this->render('product/contact.html.twig');
    }
}
