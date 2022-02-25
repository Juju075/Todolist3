<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TasksFixtures extends Fixture
{
    //Terminal server de test (doctrine:fixtures:load --env=test)
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        //Tasks role_users
        for ($nbUser=1; $nbUser <3 ; $nbUser++) { 
            $user = $this->getReference('user_'.$nbUser);

            for ($nbTask=0; $nbTask < rand(3, 12) ; $nbTask++) { 
            $task = (new Task())
            ->setTitle($faker->title())
            ->setContent($faker->content())
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'))
            ;
            
            $user->addTask($task);
            }
        }
    }

    public function getDependencies() : array
    {
        return array(
            UserFixtures::class,
        );
    }

}
