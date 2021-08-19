<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/bohnot", name="homenot")
     */
    public function index()
    {
        return new Response("Hello world");
    }

    /**
     * @Route("/aboutnot")
     */
    public function about()
    {
        return new Response("About the site");
    }

    /**
     * @Route("/viewnot", name="viewnot")
     */
    public function testView()
    {
        return $this->render("view.html.twig");
    }

    // /**
    //  * @Route("/productnot/{id}", name="productsnot", requirements={"id": "\d"})
    //  */
    // public function getProduct($id){
    //     return new Response("<h1>Post n°" . $id ." </h1>");
    // }

    /**
     * @Route("/postnot", name="detailnot")
     */
    public function getDetail(Request $request)
    {
        if ($request->query->get('slug')) {
            // dd($request);
            $num = $request->get('slug');
            //dd($request);
            return new Response("This is the post N° " . $num);
        }
        return new Response('<a href="/post?slug=post_detail8461517">Posts</a>');
    }

    /**
     * @Route("/postnot/{slug}", name="postsnot")
     */
    public function getPost(Request $request)
    {
        $num = $request->attributes->get('slug');
        //dd($request);
        return new Response("This is the post N° " . $num);
    }
}
