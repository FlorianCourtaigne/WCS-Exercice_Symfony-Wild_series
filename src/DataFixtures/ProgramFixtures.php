<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $program = new Program();
        $program->setTitle('Friends');
        $program->setSynopsis('La vie de 6 amis');
        $program->setCategory($this->getReference('category_Comédie'));
        $manager->persist($program);
        $program = new Program();
        $program->setTitle('Spartacus');
        $program->setSynopsis('Des romains qui se battent');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $program = new Program();
        $program->setTitle('Fargo');
        $program->setSynopsis('Thriller dans le nord de l\'amérique');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $program = new Program();
        $program->setTitle('Game of thrones');
        $program->setSynopsis('Politique, guerre en mode médiéval');
        $program->setCategory($this->getReference('category_Fantastique'));
        $manager->persist($program);
        $program = new Program();
        $program->setTitle('Unorthodox');
        $program->setSynopsis('Une jeune femme juive qui veut vivre une autre vie');
        $program->setCategory($this->getReference('category_Romantique'));
        $manager->persist($program);
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
