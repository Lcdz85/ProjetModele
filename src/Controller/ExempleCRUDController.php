<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;



class ExempleCRUDController extends AbstractController
{
    #[Route('/animal/insert')]
    public function insertAnimal(ManagerRegistry $doctrine)
    {
        $animal1 = new Animal ();
        $animal1->setNom('Toto');
        $animal1->setDescription('ours brun');
        // insérer une entité ds la DB

        $manager = $doctrine->getManager();
        $manager->persist($animal1);
        //créer un lien avec la DB mais ne l'insère pas
        $manager->flush();
        // valide et ajoute les données
        return new Response("Bonjour");
    }
}