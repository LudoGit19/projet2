<?php

namespace App\Controller\Admin;

use App\Entity\Type;

use App\Form\TypeType;
use Doctrine\ORM\EntityManager;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTypeController extends AbstractController
{
    /**
     * @Route("admin/type", name="admin_types")
     */
    public function index(TypeRepository $Repository)
    {
        $types = $Repository->findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            'categories' => $types
        ]);
    }

    /**
     * @Route("/admin/type/creation", name="admin_type_creation")
     * @Route("admin/type/{id}", name="admin_type_modification", methods="GET|POST")
     */
    public function ajoutEtModif(Type $type = null, Request $request, EntityManagerInterface $entityManager)
    {
    // Nous créons l'instance de "categories"
        if(!$type){
            $type = new Type();
        }
        

        // Nous créons le formulaire en utilisant "TypeType" et on lui passe l'instance
        $form = $this->createForm(TypeType::class, $type); 

        // Nous récupérons les données
        $form->handleRequest($request);
        // Nous vérifions si le formulaire a été soumis et si les données sont valides
        if ($form->isSubmitted() && $form->isValid()){
            $modif = $type->getId() !== null;
            $entityManager->persist($type);
            $entityManager->flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute('admin_types');

        }
      

            return $this->render('admin/admin_type/modifEtAjoutCategorie.html.twig',[
            "categories" => $type,
            "form"       => $form->createView(),
            // "isModification" => $type->getId() !== null
        ]);
    } 
    

     /**
     * @Route("/admin/type/{id}", name="admin_type_suppression", methods="delete")
     */
    public function suppression(Type $type, Request $request, EntityManagerInterface $entityManager)
    {
        if($this->isCsrfTokenValid("SUP". $type->getId(),$request->get('_token'))){
                   
            $entityManager->remove($type);
            $entityManager->flush();
            $this->addFlash("success","La suppression a été effectuée");
            return $this->redirectToRoute("admin_types");
        }
    }   
     
}
    

