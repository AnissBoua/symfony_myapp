<?php

namespace App\Controller;

use App\Model\Driver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        $driver = new Driver;
        $listPosts = $driver->findAll();

        return $this->render('post/index.html.twig', [
            'listPosts' => $listPosts,
        ]);
    }

    /**
     * @Route("/post/{id}", name="post_single")
     */
    public function singlePost($id): Response
    {
        $driver = new Driver;
        $listPosts = $driver->findAll();
        //dd($id);
        return $this->render('post/post.html.twig', [
            'id' => $id,
            'listPosts' => $listPosts,
        ]);
    }
}
