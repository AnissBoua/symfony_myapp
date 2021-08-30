<?php

namespace App\DataFixtures;

use App\Entity\Auto;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AutoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $pays= ['U.S.A', 'Germany', 'France', 'Italy', 'Morocco'];
        $images = ['747068.png', '777105.png', '927608.jpg', '1042734.jpg', '1065466.jpg', '1065467.jpg', '1066798.jpg', '1630234605.jpg', 'ajin-lee-.jpg'];
        $categories = [];

        $cat1 = new Category;
        $cat1->setName('Luxe');
        $cat1->setCreatedAt(new \DateTimeImmutable());

        $cat2 = new Category;
        $cat2->setName('Neuve');
        $cat2->setCreatedAt(new \DateTimeImmutable());

        $cat3 = new Category;
        $cat3->setName('Sport');
        $cat3->setCreatedAt(new \DateTimeImmutable());

        array_push($categories, $cat1, $cat2, $cat3);

        for($i = 1; $i <= 100; $i++){
            $auto = new Auto();
            $auto->setMarque("Marque n° " . $i);
            $auto->setModele("Modele n° " . $i);
            $auto->setPuissance(mt_rand(100, 1000));
            $auto->setPrix(mt_rand(5000, 150000));
            $auto->setPays($pays[array_rand($pays, 1)]);
            $auto->setImage($images[array_rand($images, 1)]);
            $auto->setCategory($categories[array_rand($categories, 1)]);
            $manager->persist($categories[array_rand($categories, 1)]);
            $manager->persist($auto);
        }
        $manager->flush();
    }
}
