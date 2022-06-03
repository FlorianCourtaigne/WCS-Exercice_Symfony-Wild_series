<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      
      $season1 = new Season();
      $season1->setNumber('1');
      $season1->setYear('1994');
      $season1->setDescription('Première saison');
      $program1 = $this->getReference('program_Friends');
      $season1->setProgram($program1);
      $this->addReference('season_Friends', $season1);
      $manager->persist($season1);
      
      $season2 = new Season();
      $season2->setNumber('2');
      $season2->setYear('1995');
      $season2->setDescription('Deuxième saison');
      $season2->setProgram($program1);
      $manager->persist($season2);

      $season3 = new Season();
      $season3->setNumber('3');
      $season3->setYear('1996');
      $season3->setDescription('Troisième saison');
      $season3->setProgram($program1);
      $manager->persist($season3);

      $season4 = new Season();
      $season4->setNumber('4');
      $season4->setYear('1997');
      $season4->setProgram($program1);
      $season4->setDescription('Quatrième saison');
      $manager->persist($season4);

      $season5 = new Season();
      $season5->setNumber('1');
      $season5->setYear('2010');
      $season5->setDescription('Première saison Spartacus');
      $program2 = $this->getReference('program_Spartacus');
      $season5->setProgram($program2);
      $this->addReference('season_Spartacus', $season5);
      
      $manager->persist($season5);

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
