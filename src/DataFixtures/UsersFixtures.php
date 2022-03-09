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
    
    //Terminal server de test (doctrine:fixtures:load --env=test)
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbUser = 0; $nbUser < 4 ; $nbUser++) { 
            
            $user = new User();
            $user->setUsername($faker->username());
            $user->setEmail($faker->email($faker->email()));
            $user->setPassword($this->passwordHasher->hashPassword($user, 'identique'));
            $user->setRoles(['NON']); //$user->setRoles(['ROLE_USER']);
            $var = $this->addReference('user_'.$nbUser,$user);
            dump($var);
            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * Implementation de FixtureGroupInterface
     * C une methode static on y accede par UsersFixtures::getGroup();
     * Avanage pas besoin d'instanciation.
     *
     * @return Array
     */
    public static function getGroups(): Array
    {
        return ['users'];
    }
}
