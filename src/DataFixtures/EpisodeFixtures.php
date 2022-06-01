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
        // $product = new Product();
        // $manager->persist($product);
        // $episode1 = new Episode();
        // $episode1->setTitle('Celui qui déménage');
        // $episode1->setNumber('1');
        // $episode1->setSynopsys('Premier épisode');
        // $episode1->setSeason($this->getReference('season_1'));
        // $manager->flush();
        // $episode2 = new Episode();
        // $episode2->setTitle('Celui qui est perdu');
        // $episode2->setNumber('2');
        // $episode2->setSynopsys('Deuxième épisode');
        // $episode2->setSeason($this->getReference('season_1'));
        // $manager->flush();
        // $episode3 = new Episode();
        // $episode3->setTitle('Celui qui a un rôle');
        // $episode3->setNumber('3');
        // $episode3->setSynopsys('Troisième épisode');
        // $episode3->setSeason($this->getReference('season_1'));
        // $manager->flush();
        // $episode3 = new Episode();
        // $episode3->setTitle('Celui avec George');
        // $episode3->setNumber('4');
        // $episode3->setSynopsys('Quatrième épisode');
        // $episode3->setSeason($this->getReference('season_1'));
        // $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          SeasonFixtures::class,
        ];
    }
}
