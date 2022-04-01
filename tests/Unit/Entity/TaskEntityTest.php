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
    
    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
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
    
    /**
     * Undocumented function
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
    // test correct entity | 
    // ======================================================================= 
    public function testValidEntity(): void
    {
        $this->assertHasErrors($this->getEntity(),0);
    }

    // =======================================================================
    //  test constaint lengh | 
    // =======================================================================   

}