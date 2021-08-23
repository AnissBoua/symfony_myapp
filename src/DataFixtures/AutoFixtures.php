<?php

namespace App\DataFixtures;

use App\Entity\Auto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AutoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $pays= ['U.S.A', 'Germany', 'France', 'Italy', 'Morocco'];
        for($i = 1; $i <= 100; $i++){
            $auto = new Auto();
            $auto->setMarque("Marque n° " . $i);
            $auto->setModele("Modele n° " . $i);
            $auto->setPuissance(mt_rand(100, 1000));
            $auto->setPrix(mt_rand(5000, 150000));
            $auto->setPays($pays[array_rand($pays, 1)]);
            $auto->setImage('/img/cat.jpg');
            $manager->persist($auto);
        }
        $manager->flush();
    }
}
