<?php
declare(strict_types = 1);
namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture implements FixtureGroupInterface
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher) 
    { 
        $this->passwordHasher = $passwordHasher;
    }
    
    //Terminal server de test (symfony console d:f:l --group=users --env=test --no-interaction)
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbUser = 1; $nbUser < 5 ; $nbUser++) { 

            $user = new User();
            $user->setUsername($faker->username());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'identique'));
            $user->setEmail($faker->email($faker->email()));
            
            //Ajouter 'ROLE_ANONYMOUS']

            //Overriding.
            if ($nbUser === 1) {
                $user->setRoles(['ROLE_ADMIN']);
                $user->setEmail('admin@todolist.com');
            }elseif ($nbUser === 2) {
                $user->setEmail('john.doe@testexample.com');
                $user->setRoles(['ROLE_USER']); 
            }else{
                $user->setRoles(['ROLE_USER']);
            }           
            $this->addReference('user_'. $nbUser, $user);
            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * Implementation de FixtureGroupInterface
     * C une methode static on y accede par UsersFixtures::getGroup();
     * AvanTage pas besoin d'instanciation.
     *
     * @return Array
     */
    public static function getGroups(): Array
    {
        return ['users'];
    }
}