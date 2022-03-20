<?php
declare(strict_types = 1);
namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\DataFixtures\UsersFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TasksFixtures extends Fixture
{ 
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        //User 0 it's Admin user_admin_0
        for ($nbUser = 1; $nbUser <3 ; $nbUser++) { 
            $user = $this->getReference('user_'.$nbUser);
            
            for ($nbTask=0; $nbTask < rand(3, 12) ; $nbTask++) { 
            $task = new Task();
            $task->setTitle($faker->title());
            $task->setContent($faker->content());
            $task->setCreatedAt($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'));
            
            $user->addTask($task);
            $manager->persist($task);
            }
        }
        $manager->flush();
    }

    public function getDependencies() : array
    {
        return array(
            UsersFixtures::class,
        );
    }
}
