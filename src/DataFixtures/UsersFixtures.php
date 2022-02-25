<?php

namespace App\DataFixtures;


use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $encoder) 
    { 
        $this->encoder = $encoder;
    }
    
    //Terminal server de test (doctrine:fixtures:load --env=test)
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($nbUser = 0; $nbUser < 4 ; $nbUser++) { 
            
            $user = new User();
            
            if ($user === 0) {
                    $user->setUsername('admin');
                    $user->setEmail($faker->email());
                    $user->setRoles(['ROLE_ADMIN']);
                    $user->setPassword('identique');
                ;
                $this->addReference('user_admin_'.$nbUser,$user);
                $manager->persist($user);
            }
            $user->setUsername($faker->username());
            $user->setEmail($faker->email($faker->email()));
            $user->setRoles(['ROLE_USER']);
            $user->setPassword('identique');
            ;
            $this->addReference('user_'.$nbUser,$user);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
