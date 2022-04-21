<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Entity;

use Faker;
use App\Entity\Task;
use App\Entity\User;
use App\Tests\security\LoginAccount;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Pupose check entity constraint.
 * a voir probleme avec les chainages.
 */


class TaskEntityTest extends WebTestCase
{
    private $client;
    private $em;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
        $kernel = self::bootKernel();
        $this->em = $kernel
        ->getContainer()
        ->get('doctrine')
        ->getManager();
    }
    
    /**
     * Refactoring
     *
     * @return Task
     */
    public function getEntity(): Task
    {
        $faker = Faker\Factory::create('fr_FR');

        LoginAccount::LoginAsAdmin($this->client);

        //on recuper le user (service container).
        $user = self::getContainer()
            ->get('doctrine')
            ->getRepository(User::class)
            ->findOneByEmail('admin@todolist.com')
            ;
        
        $task = new Task();
        $task->setTitle($faker->title());
        $task->setContent($faker->text());
        $task->setUser($user);                  
        $task->setCreatedAt(new \DateTime());

        return $task; 
    } 
    public function getTaskByRepository(): Task // null
    {
        $user = $this->em
        ->getRepository(Task::class)
        ->findOneBy(['title'=>'dolore'])
        ; 

        return $user;
    }
    /**
     * Pour tester les validateurs.
     *
     * @param Task $task
     * @param integer $number
     * @return void
     */
    public function assertHasErrors(Task $task, int $number = 0)
    {
        //on recupere le validateur.(service container).    
        self::bootKernel();
        $error = self::getContainer()->get('validator')->validate($task);
        $this->assertCount($number, $error);
    } 
    
    // =======================================================================
    //  test constaint lengh | ok validé
    // =======================================================================  
    public function testValidEntity(): void
        {
        $this->assertHasErrors($this->getEntity(),0);
        }

    public function testInvalidValidEntity(): void 
    {
        $entity = $this->getEntity();
        $entity->setContent('');

        //Overiding (username) contrainte +3 caract
        $this->assertHasErrors($entity, 1);
    } 

    // ----------------------------------------------------------------------
    // TaskEntity::getUser() | Assert |
    // ----------------------------------------------------------------------
        public function testgetUser()
        {
            //Task::repository
            $task = $this->getTaskByRepository();
            
            $this->assertNotEmpty($task->getUser());
        } 
}
