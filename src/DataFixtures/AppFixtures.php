<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ingredient;
use Faker\Factory;
use Generator;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 50; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
                // prix entre 0 et 100
                ->setPrice(mt_rand(0, 100));

            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
