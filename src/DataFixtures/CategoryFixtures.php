<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{


    // public function load(ObjectManager $manager)
    // {
    //     $category = new Category();
    //     $category->setName('Comédie');
    //     $manager->persist($category);
    //     $manager->flush();
    // }


    CONST CATEGORIES = [
        'Action',
        'Comédie',
        'Animation',
        'Fantastique',
        'Horreur',
        'Romantique',
        'Biopic'
    ];
    
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('category_' . $categoryName, $category);
        }

        $manager->flush();
    }

}
