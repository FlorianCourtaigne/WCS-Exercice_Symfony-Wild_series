<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM_ID = 136;
    
    public function load(ObjectManager $manager): void
    {
        $program1 = new Program();
        $program1->setTitle('Friends');
        $program1->setSynopsis('La vie de 6 amis');
        $program1->setCategory($this->getReference('category_Comédie'));
        $program1->setCountry('USA');
        $program1->setYear('1994');
        $manager->persist($program1);
        $this->addReference(self::PROGRAM_ID, $program1);
        $program2 = new Program();
        $program2->setTitle('Spartacus');
        $program2->setSynopsis('Des romains qui se battent');
        $program2->setCategory($this->getReference('category_Action'));
        $program2->setCountry('USA');
        $program2->setYear('2010');
        $manager->persist($program2);
        $program3 = new Program();
        $program3->setTitle('Fargo');
        $program3->setSynopsis('Thriller dans le nord de l\'amérique');
        $program3->setCategory($this->getReference('category_Action'));
        $program3->setCountry('USA');
        $program3->setYear('2014');
        $manager->persist($program3);
        $program4 = new Program();
        $program4->setTitle('Game of thrones');
        $program4->setSynopsis('Politique, guerre en mode médiéval');
        $program4->setCategory($this->getReference('category_Fantastique'));
        $program4->setCountry('USA');
        $program4->setYear('2011');
        $manager->persist($program4);
        $program5 = new Program();
        $program5->setTitle('Unorthodox');
        $program5->setSynopsis('Une jeune femme juive qui veut vivre une autre vie');
        $program5->setCategory($this->getReference('category_Romantique'));
        $program5->setCountry('USA');
        $program5->setYear('2020');
        $manager->persist($program5);
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}
