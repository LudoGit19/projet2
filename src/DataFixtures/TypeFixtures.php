<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t1 = new Type();
        $t1->setLabel("u7");
        $t1->setImage("team1.png");
        $manager->persist($t1);

        $t2 = new Type();
        $t2->setLabel("u9");
        $t2->setImage("team2.png");
        $manager->persist($t2);

        $t3 = new Type();
        $t3->setLabel("u11");
        $t3->setImage("team3.png");
        $manager->persist($t3);

        $t4 = new Type();
        $t4->setLabel("u13");
        $t4->setImage("team1.jpg");
        $manager->persist($t4);

        // $playerRepository = $manager->getRepository(Player::class);
        // $p1 = $playerRepository->findOneBy(["lname"=>"Menahes"]);
        // $p1->setType($t3);
        // $manager->persist($p1);

        // $playerRepository = $manager->getRepository(Player::class);
        // $p2 = $playerRepository->findOneBy(["lname"=>"LepetitU13"]);
        // $p2->setType($t4);
        // $manager->persist($p2);

        // $playerRepository = $manager->getRepository(Player::class);
        // $p3 = $playerRepository->findOneBy(["lname"=>"testorU7"]);
        // $p3->setType($t1);
        // $manager->persist($p3);

        // $playerRepository = $manager->getRepository(Player::class);
        // $p4 = $playerRepository->findOneBy(["lname"=>"cochainU9"]);
        // $p4->setType($t2);
        // $manager->persist($p4);


        $manager->flush();
    }
}
