<?php

namespace App\Model;

use App\Entity\Post;
use Symfony\Component\Validator\Constraints\Date;

class Driver
{
    public function findAll()
    {
        $post1 = new Post();
        $post1->setId(1);
        $post1->setSlug("Post00000001");
        $post1->setTitle("Post 1");
        $post1->setExcerpt("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto sed, deserunt quibusdam maiores ad hic esse sapiente. Illum, fugiat ipsa deleniti magni laborum ducimus quisquam laboriosam? Necessitatibus amet quo ipsa!");
        $post1->setCreateDate(date("d/m/Y"));

        $post2 = new Post();
        $post2->setId(2);
        $post2->setSlug("Post00000002");
        $post2->setTitle("Post 2");
        $post2->setExcerpt("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto sed, deserunt quibusdam maiores ad hic esse sapiente. Illum, fugiat ipsa deleniti magni laborum ducimus quisquam laboriosam? Necessitatibus amet quo ipsa!");
        $post2->setCreateDate(date("d/m/Y"));

        $post3 = new Post();
        $post3->setId(3);
        $post3->setSlug("Post00000003");
        $post3->setTitle("Post 3");
        $post3->setExcerpt("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto sed, deserunt quibusdam maiores ad hic esse sapiente. Illum, fugiat ipsa deleniti magni laborum ducimus quisquam laboriosam? Necessitatibus amet quo ipsa!");
        $post3->setCreateDate(date("d/m/Y"));

        $posts = [];

        array_push($posts, $post1, $post2, $post3);
        return $posts;
    }
}
