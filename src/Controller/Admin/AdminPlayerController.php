<?php

namespace App\Controller\Admin;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPlayerController extends AbstractController
{
    /**
     * @Route("/admin/player", name="admin_player")
     */
    public function index(PlayerRepository $repository)
    {
        $players =$repository->findAll();
        return $this->render('admin/admin_player/adminPlayer.html.twig', [
            'players' => $players
        ]);
    }

    /**
     * @Route("/admin/player/creation", name="admin_player_creation")
     * @Route("/admin/player/{id}", name="admin_player_modification", methods="GET|POST")
     */
    public function modifEtAjout(Player $player = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$player) {
            $player = new Player();
        }

        $form = $this->createForm(PlayerType::class, $player); // cette action lie le form ) l'objet $player

      
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $modif = $player->getId() !== null;
            $entityManager->persist($player);
            $entityManager->flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute("admin_player");
        }

        return $this->render('admin/admin_player/modifEtAjoutPlayer.html.twig', [
            "player" => $player,
            "form"   => $form->createView(),
            "isModification" => $player->getId() !== null

        ]);
    }

     /**
     * @Route("/admin/player/{id}", name="admin_player_suppression", methods="delete")
     */
    public function suppression(Player $player, Request $request, EntityManagerInterface $entityManager)
    {
        if($this->isCsrfTokenValid("SUP". $player->getId(),$request->get('_token'))){
                   
            $entityManager->remove($player);
            $entityManager->flush();
            $this->addFlash("success","La suppression a été effectuée");
            return $this->redirectToRoute("admin_player");
        }
    }
}
