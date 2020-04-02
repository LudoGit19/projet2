<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Player();
        $p1->setFname("Titouan")
            ->setLname("Cochain")
            ->setMail("tit@gmail.com")
            ->setPhone("0615151515")
            ->setImage("p1.png");
            $manager->persist($p1);

        $p2 = new Player();
        $p2->setFname("Luc")
            ->setLname("Poilly")
            ->setMail("luc@gmail.com")
            ->setPhone("0616161616")
            ->setImage("p2.png");
            $manager->persist($p2);

        $p3 = new Player();
        $p3->setFname("Rapha")
            ->setLname("Menahes")
            ->setMail("rapha@gmail.com")
            ->setPhone("0617171717")
            ->setImage("p3.png");
            $manager->persist($p3);
        
        $p4 = new Player();
        $p4->setFname("Kelyan")
            ->setLname("Legrand")
            ->setMail("kelyan@gmail.com")
            ->setPhone("0618181818")
            ->setImage("p4.png");
            $manager->persist($p4);


        $manager->flush();
    }
}
