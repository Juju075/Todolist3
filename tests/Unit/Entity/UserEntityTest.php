<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Faker;

/**
 * Purpose check entity constraint.
 * a voir probleme avec les chainages.
 */
class UserEntityTest extends KernelTestCase
{
    /**
     * Refactoring
     *
     * @return void 
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

    // =======================================================================
    // test correct entity |ok validé 
    // ======================================================================= 
    public function testValidEntity(): void
    {
        $this->assertHasErrors($this->getEntity(),0);
    }

    // =======================================================================
    //  test constaint lengh | ok validé
    // =======================================================================   
   //TypeError: ::assertHasErrors(): Argument #1 ($user) must be of type App\Entity\User, null given.
    public function testInvalidValidEntity(): void 
    {
        $entity = $this->getEntity();
        $entity->setUsername('ab');

        //Overiding (username) contrainte +3 caract
        $this->assertHasErrors($entity, 1);
    }

    // =======================================================================
    //  test constraint not blank | commented
    // =======================================================================   
   //TypeError: ::assertHasErrors(): Argument #1 ($user) must be of type App\Entity\User, null given.


    // =======================================================================
    //  test constraint uniq  | 
    // =======================================================================   
}
