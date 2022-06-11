<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();

        for ($i = 0; $i < 500; $i++) {

            $episode = new Episode();

            //Ce Faker va nous permettre d'alimenter l'instance de Season que l'on souhaite ajouter en base
            $episode->setTitle($faker->words(5, true));
            $episode->setNumber($faker->numberBetween(1, 10));
            $episode->setSynopsis($faker->paragraphs(3, true));

            $episode->setSeason($this->getReference('season_' . $faker->numberBetween(0, 49) ));

            $manager->persist($episode);
        }

        $manager->flush();


        // $episode1 = new Episode();
        // $episode1->setTitle('Celui qui déménage');
        // $episode1->setNumber('1');
        // $episode1->setSynopsys('Premier épisode');
        // $season1 = $this->getReference('season_Friends');
        // $episode1->setSeason($season1);

        // $episode2 = new Episode();
        // $episode2->setTitle('Celui qui est perdu');
        // $episode2->setNumber('2');
        // $episode2->setSynopsys('Deuxième épisode');
        // $episode2->setSeason($season1);

        // $episode3 = new Episode();
        // $episode3->setTitle('Celui qui a un rôle');
        // $episode3->setNumber('3');
        // $episode3->setSynopsys('Troisième épisode');
        // $episode3->setSeason($season1);
        
        // $manager->persist($episode1);
        // $manager->persist($episode2);
        // $manager->persist($episode3);


    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
