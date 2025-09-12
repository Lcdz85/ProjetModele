<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\ProprietaireFixtures;
use Faker;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // sans Faker
        // for ($i=0; $i<50; $i++){
        //     $animal = new Animal();
        //     $animal->setNom("nom". $i);
        //     $animal->setDescription(rand(20,100));
        //     $manager->persist($animal);
        // }

        // avec Faker
        $faker = Faker\Factory::create('fr_BE');
        for ($i=0; $i<50; $i++){
                $animal = new Animal();
                $animal->setNom($faker->firstName);
                $animal->setDescription($faker->word);
                $manager->persist($animal);

                $animal->setProprietaire($this->getReference('proprietaire'. rand(0,2), Proprietaire::class));
        }

        $manager->flush();
    }

     public function getDependencies(): array
     {
        return 
        [ProprietaireFixtures::class];
     }
}
