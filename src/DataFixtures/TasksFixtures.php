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

        //Comment avoir la liste des refs cree (nombre)
        //1 Admin(0)
        //3 User (1-3)




        //Tasks users
        for ($nbUser=1; $nbUser <3 ; $nbUser++) { 
            $user = $this->getReference('user_'.$nbUser);
            $task = new Task();

            //cree entre 3-12 tasks
            for ($nbTask=0; $nbTask < random() ; $nbTask++) { 
                //
            }

        }
        //Chaque user role_user cree (entre 6 - 12 taches)
       // chaque user valide 3 taches au hasard ds la liste des taches cree.

       // for 3 user role_user
       //creer 1 user role_user
       //cet user cree liste = random(6, 12) taches

        //for 3 numero random dans la liste
        //user valide la tache

    }
}
