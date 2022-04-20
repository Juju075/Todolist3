<?php
declare(strict_types = 1);
namespace App\DataFixtures;

use Faker;
use App\Entity\Task;
use App\DataFixtures\UsersFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TasksFixtures extends Fixture implements DependentFixtureInterface
{ 
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbUser = 1; $nbUser <5 ; $nbUser++) { 
            $user = $this->getReference('user_'.$nbUser);
        
            for ($nbTask=0; $nbTask < rand(3, 12) ; $nbTask++) { 
            $task = new Task();
            $task->setTitle($faker->word());
            $task->setContent($faker->text(250));
            $task->setCreatedAt($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'));
            $task->setUser($user);
            $user->addTask($task);
            $manager->persist($task);
            }
        }
        $manager->flush();

        //Ajout 4 task anonymes - merde utilise le dernier connu

        for ($i=0; $i <5 ; $i++) { 
            $task = new Task();
            $task->setTitle($faker->word());
            $task->setContent('Anonymous content'.'_'.$i);
            $task->setCreatedAt($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'));
            $manager->persist($task);
        }
        $manager->flush();
    }

    public function getDependencies(): Array
    {
        return [
            UsersFixtures::class,
        ];
    }
}
