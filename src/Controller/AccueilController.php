<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Animal;

final class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        $adresse = ["rue" => "Rue Van Aa",
                    "numero"=>"12",
                    " codePostal"=>"1060"];

        $vars = [ "nom" => "Laura",
                "dateNaissance" => new \DateTime("2002-1-1"),
                "adresse"=> $adresse];
            
        return $this->render('accueil/index.html.twig', $vars);
    }
    #[Route('/accueil/testModele')]
    public function testModele(EntityManagerInterface $em){
        $rep = $em->getRepository(Animal::class);
        $animaux = $rep->findAll();
        // $animaux = $em->getRepository(Animal::class)->findAll();

        // dd($animaux);
        $vars = ["animaux"=>$animaux];
        

        return $this->render('accueil/test_modele.html.twig', $vars);
    }
}
