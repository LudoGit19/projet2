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
        $t1 ->setLabel("u7");
        $manager->persist($t1);

        $t2 = new Type();
        $t2 ->setLabel("u9");
        $manager->persist($t2);

        $t3 = new Type();
        $t3 ->setLabel("u11");
        $manager->persist($t3);

        $t4 = new Type();
        $t4 ->setLabel("u13");
        $manager->persist($t4);

        $playerRepository = $manager->getRepository(Player::class);
        $p1 = $playerRepository->findOneBy(["lname"=>"Menahes"]);
        $p1->setType($t3);
        $manager->persist($p1);

        $playerRepository = $manager->getRepository(Player::class);
        $p2 = $playerRepository->findOneBy(["lname"=>"Lepetit"]);
        $p2->setType($t3);
        $manager->persist($p2);

        $playerRepository = $manager->getRepository(Player::class);
        $p3 = $playerRepository->findOneBy(["lname"=>"testor"]);
        $p3->setType($t2);
        $manager->persist($p3);


        $manager->flush();
    }
}
