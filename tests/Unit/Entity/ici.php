<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Faker;

class UserEntityTest extends KernelTestCase
{
    /**
     * Refactoring
     *
     * @return void // manque return entity
     */
    public function getEntity(): User
    {
        $faker = Faker\Factory::create('fr_FR');

        $user = new User();
        $user->setUsername($faker->name());
        $user->setEmail($faker->email());
        $user->setRoles(['ROLE_USER']) ;
        $user->setPassword('identique') ;
        $user->setCreatedAt(new \DateTime());

        return $user;

        // $user = (new User())
        //     ->setUsername('ezerzerzerzer')
        //     ->setPassword('')
        // ;
    }

    /**
     * Refactoring
     *
     * @param User $user
     * @param integer $number
     * @return void
     */
    public function assertHasErrors(User $user , int $number = 0)
    {
        //on recupere le validateur.    
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($user);
        $this->assertCount($number, $error);
    }

    public function testValidEntity(): void
    {
        $this->assertHasErrors($this->getEntity(),0); //expected entity found void
    }


    public function testInvalidValidEntity(): void 
    {
        //Overiding (username) contrainte +3 caract
        $this->assertHasErrors($this->getEntity()->setUsername('ab'), 1);
    }
}
