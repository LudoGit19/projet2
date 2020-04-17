<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{

    // /**
    //  * @Route("/", name="home")
    //  */
    // public function index()
    // {
       
    //     return $this->render('home/index.html.twig');
    // }

    /**
     * @Route("/", name="home")
     */
    public function menu()
    {
       
        return $this->render('home/menu.html.twig');
    }


    /**
     * @Route("/players", name="players")
     */
    public function affichePlayers(PlayerRepository $repository)
    {
        $players = $repository->findAll();
        return $this->render('player/players.html.twig', [
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
