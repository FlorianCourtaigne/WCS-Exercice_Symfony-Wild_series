<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 1; $i < 11; $i++) {
            $actor = new Actor();
            //Ce Faker va nous permettre d'alimenter l'instance de Season que l'on souhaite ajouter en base
            $actor->setFirstname($faker->firstName());
            $actor->setLastname($faker->lastName());
            $actor->setBirthDate($faker->dateTimeBetween($startDate = '-70 years', $endDate = '-20 years'));
            
            for($p = 1; $p < 4; $p++)
                $actor->addProgram($this->getReference('program_' . $faker->numberBetween(1, 5)));

            $manager->persist($actor);
        } 

        $manager->flush();
    }

    public function getDependencies()
    {
      // Tu retournes ici toutes les classes de fixtures dont ActorFixtures dépend
      return [
        ProgramFixtures::class,
      ];
    }
}
