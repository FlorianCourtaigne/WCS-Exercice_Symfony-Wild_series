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
      $season1->setProgram($this->getReference('program'.ProgramFixtures::PROGRAM_ID));
      $season1->setDescription('Première saison');
      $manager->flush();
      $season2 = new Season();
      $season2->setNumber('2');
      $season2->setYear('1995');
      $season2->setProgram($this->getReference('program'.$season1->setNumber()));
      $season2->setDescription('Deuxième saison');
      $manager->flush();
      $season3 = new Season();
      $season3->setNumber('3');
      $season3->setYear('1996');
      $season3->setProgram($this->getReference('program'.$season1->setNumber()));
      $season3->setDescription('Troisième saison');
      $manager->flush();
      $season4 = new Season();
      $season4->setNumber('4');
      $season4->setYear('1997');
      $season4->setProgram($this->getReference('program'.$season1->setNumber()));
      $season4->setDescription('Quatrième saison');
      $manager->flush();
      $season5 = new Season();
      $season5->setNumber('5');
      $season5->setYear('1998');
      $season5->setProgram($this->getReference('program'.$season1->setNumber()));
      $season5->setDescription('Cinquième saison');
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
