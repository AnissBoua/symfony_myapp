<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController{
    /**
     * @Route("/boh", name="home")
     */
    public function index(){
        return new Response("Hello world");
    }

    /**
     * @Route("/aboutbis")
     */
    public function about(){
        return new Response("About the site");
    }

     /**
     * @Route("/view", name="view")
     */
    public function testView(){
        return $this->render("view.html.twig");
    }

    // /**
    //  * @Route("/productbis/{id}", name="products", requirements={"id": "\d"})
    //  */
    // public function getProduct($id){
    //     return new Response("<h1>Post n°" . $id ." </h1>");
    // }
    
    /**
     * @Route("/post", name="detail")
     */
    public function getDetail(Request $request){
        if($request->query->get('slug')){
            // dd($request);
            $num = $request->get('slug');
            //dd($request);
            return new Response("This is the post N° " . $num);
        }
        return new Response('<a href="/post?slug=post_detail8461517">Posts</a>');
    }
    
    /**
     * @Route("/post/{slug}", name="posts")
     */
    public function getPost(Request $request){
        $num = $request->attributes->get('slug');
        //dd($request);
        return new Response("This is the post N° " . $num);
    }
}