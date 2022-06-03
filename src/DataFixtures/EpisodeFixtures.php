<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $episode1 = new Episode();
        $episode1->setTitle('Celui qui déménage');
        $episode1->setNumber('1');
        $episode1->setSynopsys('Premier épisode');
        $season1 = $this->getReference('season_Friends');
        $episode1->setSeason($season1);

        $episode2 = new Episode();
        $episode2->setTitle('Celui qui est perdu');
        $episode2->setNumber('2');
        $episode2->setSynopsys('Deuxième épisode');
        $episode2->setSeason($season1);

        $episode3 = new Episode();
        $episode3->setTitle('Celui qui a un rôle');
        $episode3->setNumber('3');
        $episode3->setSynopsys('Troisième épisode');
        $episode3->setSeason($season1);
        
        $manager->persist($episode1);
        $manager->persist($episode2);
        $manager->persist($episode3);

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
