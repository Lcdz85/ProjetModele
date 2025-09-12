<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class ProprietaireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $faker = Faker\Factory::create('fr_BE');
        for ($i=0; $i<50; $i++)
        {
                $proprietaire = new Proprietaire();
                $proprietaire->setNom($faker->lastName());
                $proprietaire->setPrenom($faker->firstName());
                $manager->persist($proprietaire);

                //référence qui existe ds la memeoire mais pas ds la DB
                $this->addReference('proprietaire'.$i, $proprietaire);
        }

        $manager->flush();
    }
}