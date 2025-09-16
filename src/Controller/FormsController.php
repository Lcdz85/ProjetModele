<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AnimalType;    
use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;

final class FormsController extends AbstractController
{
    #[Route('/afficher/form', name: 'app_forms')]
    public function afficherForm(): Response
    {
        // créer un formulaire
        $animalForm = $this->createForm(AnimalType::class);
        $vars = ['animalForm' => $animalForm];
        // dd($animalForm);
        return $this->render('forms/afficher_form.html.twig',$vars);
    }

    #[Route('/forms/insert/animal')]
    public function insertAnimal(Request $req, EntityManagerInterface $em): Response
    {
        $animal = new Animal();
        $animalForm = $this->createForm(AnimalType::class, $animal);

        $animalForm->handleRequest($req);

        if ($animalForm->isSubmitted()){
            $em->persist($animal);
            $em->flush();
            return $this->redirectToRoute('app_form_afficher_animaux');
        }
        
        else {
            $vars = ['animalForm' => $animalForm];
            return $this->render('forms/afficher_form_insert_animal.html.twig', $vars);
        }
    }

    #[Route('/forms/afficher/animaux', name: 'app_form_afficher_animaux')]
     public function afficherAnimaux(EntityManagerInterface $em)
     {
        $rep = $em->getRepository(Animal::class);
        $animaux = $rep->findAll();

        $vars = ['animaux' => $animaux];

        return $this->render('forms/afficher_animaux.html.twig', $vars);
     }

}
