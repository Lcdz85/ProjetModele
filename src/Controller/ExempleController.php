<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Proprietaire;
;

final class ExempleController extends AbstractController
{
    #[Route('/exemple', name: 'app_exemple')]
    public function index(): Response
    {
        return $this->render('exemple/index.html.twig', [
            'controller_name' => 'ExempleController',
        ]);
    }

    #[Route('/exemple/bonjour')]
    public function bonjour(){
        return $this->render ('exemple/bonjour.html.twig');
    }

    #[Route('exemple/insert')]
    public function insertProrietaire(EntityManagerInterface $manager)
    {
        $proprio1 = new Proprietaire();
        $proprio1->setNom('Jojo');

        $manager->persist($proprio1);
        $manager->flush();

        return new response('Insertion ok');
    }

}
