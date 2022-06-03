<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager){
      $season1 = new Season();
      $season1->setNumber('1');
      $season1->setYear('1994');
      $program = $this->getReference('program_Friends');
      $season1->setDescription('Première saison');
      $season1->setProgram($program);

      $season2 = new Season();
      $season2->setNumber('2');
      $season2->setYear('1995');
      $season2->setDescription('Deuxième saison');
      $season2->setProgram($program);

      $season3 = new Season();
      $season3->setNumber('3');
      $season3->setYear('1996');
      $season3->setDescription('Troisième saison');
      $season3->setProgram($program);

      $season4 = new Season();
      $season4->setNumber('4');
      $season4->setYear('1997');
      $season4->setProgram($program);
      $season4->setDescription('Quatrième saison');

      $manager->persist($season1);
      $manager->persist($season2);
      $manager->persist($season3);
      $manager->persist($season4);
      $manager->flush();

    }

    public function getDependencies()
    {
      // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
      return [
        ProgramFixtures::class,
      ];
    }
}
