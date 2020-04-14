<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user); 

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $passwordCrypte = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypte);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('menu');
        }
        return $this->render('admin_secu/registration.html.twig', [
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/login", name="connexion")
     */
    public function login(){
        return $this-> render("admin_secu/login.html.twig");
    }
}
