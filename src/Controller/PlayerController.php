<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{
     /**
     * @Route("/", name="players")
     */
    public function index(PlayerRepository $repository)
    {
        $players = $repository->findAll();
        return $this->render('player/player.html.twig', [
            'players' => $players,
            'isPlayer' => false
        ]);
    }

     /**
     * @Route("/players/{lname}", name="playersParNom")
     */
    // public function playerParNom(PlayerRepository $repository, $lname)
    // {
    //     $players = $repository->getPlayerParNom($lname);
    //     return $this->render('player/player.html.twig', [
    //         'players' => $players,
    //         'isPlayer' => true
    //     ]);
    // }
}
