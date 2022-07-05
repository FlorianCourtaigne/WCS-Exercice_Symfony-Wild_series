<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      
      $faker = Factory::create();

      for($i = 0; $i < 50; $i++) {
        $season = new Season();
        //Ce Faker va nous permettre d'alimenter l'instance de Season que l'on souhaite ajouter en base
        $season->setNumber($faker->numberBetween(1, 5));
        $season->setYear($faker->year());
        $season->setDescription($faker->sentence(3, true));

        $season->setProgram($this->getReference('program_' . $faker->numberBetween(1, 5)));
        $this->addReference('season_'. $i, $season);

        $manager->persist($season);
      } 

      $manager->flush();

      // $season1 = new Season();
      // $season1->setNumber('1');
      // $season1->setYear('1994');
      // $season1->setDescription('Première saison');
      // $program1 = $this->getReference('program_Friends');
      // $season1->setProgram($program1);
      // $this->addReference('season_Friends', $season1);
      // $manager->persist($season1);
      
      // $season2 = new Season();
      // $season2->setNumber('2');
      // $season2->setYear('1995');
      // $season2->setDescription('Deuxième saison');
      // $season2->setProgram($program1);
      // $manager->persist($season2);

      // $season3 = new Season();
      // $season3->setNumber('3');
      // $season3->setYear('1996');
      // $season3->setDescription('Troisième saison');
      // $season3->setProgram($program1);
      // $manager->persist($season3);

      // $season4 = new Season();
      // $season4->setNumber('4');
      // $season4->setYear('1997');
      // $season4->setProgram($program1);
      // $season4->setDescription('Quatrième saison');
      // $manager->persist($season4);

      // $season5 = new Season();
      // $season5->setNumber('1');
      // $season5->setYear('2010');
      // $season5->setDescription('Première saison Spartacus');
      // $program2 = $this->getReference('program_Spartacus');
      // $season5->setProgram($program2);
      // $this->addReference('season_Spartacus', $season5);
      


    }

    public function getDependencies()
    {
      // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
      return [
        ProgramFixtures::class,
      ];
    }
}
