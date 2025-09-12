<?php

// namespace App\DataFixtures;

// use App\Entity\Animal;
// use App\Entity\Proprietaire;

// use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Common\DataFixtures\DependentFixtureInterface;
// use Doctrine\Persistence\ObjectManager;
// use Faker;
// use Doctrine\Common\DataFixtures\DependentFixtureInterface;


// class AniProprioFixtures extends Fixture implements DependentFixtureInterface
// {
//     public function load (ObjectManager $manager):void
//     {
//         // récup tous les animaux
//         $repoAni = $manager->getRepository(Animal::class);
//         $animaux = $repoAni->findAll();

//         // récup tous les proprietaires
//         $repoProprio = $manager->getRepository(Proprietaire::class);
//         $proprio = $repoProprio->findAll();


//         foreach($animaux as $animal){
//             $animal->setProrietaire($proprio[rand(0,count($proprio)-1)]);
//         }

//     }

//     public function
// }
