<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user); 

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('players');
        }
        return $this->render('admin_secu/registration.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
