<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Entity;

use Faker;
use App\Entity\Task;
use App\Entity\User;
use App\Tests\security\LoginAccount;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use function PHPUnit\Framework\assertCount;

/**
 * Purpose check entity constraint.
 * a voir probleme avec les chainages.
 */
class UserEntityTest extends WebTestCase
{
private $em;

    public function setUp(): void
    {
        //recuperation service Manager (Interogtion Bdd)
        $kernel = self::bootKernel();
        $this->em = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager()
            ;
    }


    /**
     * Generated User
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

    public function getGeneratedTask(): Task
    {
        //cree une task
        $faker = Faker\Factory::create('fr_FR');    
        $task = new Task();
        $task->setTitle($faker->title());
        $task->setContent($faker->text());
        $task->setUser($this->getEntity());                  
        $task->setCreatedAt(new \DateTime());

        return $task;
    }

    /**
     * getUser in UserRepository.
     *
     * @return User
     */
    public function getUserByRepository(): User
    {
        $user = $this->em
        ->getRepository(User::class)
        ->findOneByEmail('john.doe@testexample.com')
        ; 

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

    // ----------------------------------------------------------------------
    // TaskVoterTest::() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 
    public function testValidEntity(): void
    {
        $this->assertHasErrors($this->getEntity(),0);
    }

    // ----------------------------------------------------------------------
    // TaskVoterTest::() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 
   //TypeError: ::assertHasErrors(): Argument #1 ($user) must be of type App\Entity\User, null given.
    public function testInvalidValidEntity(): void 
    {
        $entity = $this->getEntity();
        $entity->setUsername('ab');

        //Overiding (username) contrainte +3 caract
        $this->assertHasErrors($entity, 1);
    } 



    // ----------------------------------------------------------------------
    // TaskVoterTest::() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 
    public function testUserGetTask(): void
    {
        //Besoin UserRepository
        $user = $this->getUserByRepository();
        
        //Verif si ta
        $this->assertNotEmpty($user->getTask()->count());
    }

    // ----------------------------------------------------------------------
    // TaskVoterTest::() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 

    public function testAddTask(): void
        {
            $user = $this->getEntity();

            //cree une task
            $faker = Faker\Factory::create('fr_FR');    
            $task = new Task();
            $task->setTitle($faker->title());
            $task->setContent($faker->text());
            $task->setUser($user);                  
            $task->setCreatedAt(new \DateTime());

            
            $user->addTask($task);

            //Verifi 
            $this->assertNotEmpty($user);
        }

    // ----------------------------------------------------------------------
    // UserEntity::removeTask()| Assert |
    // ----------------------------------------------------------------------
    public function testRemoveTask(): void
    {
        //userRepository
        $user = $this->getEntity();

        //debuger la reponse
        $result = $user->removeTask($this->getGeneratedTask());
        dump($result);

        //Assertion
        //$this->assert
    }
}