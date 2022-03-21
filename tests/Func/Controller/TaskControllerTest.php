<?php
declare(strict_types = 1); 
namespace App\Tests;

use Faker;
use App\DataFixtures\TasksFixtures;
use App\Tests\security\LoginAccount;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * APP TODOLIST - FONCTIONALITIES DOCUMENTATION
 */
class TaskControllerTest extends WebTestCase
{
    private $client;
    private $faker;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->faker = Faker\Factory::create('fr_FR');
    }

    // =======================================================================
    // Tests Home Page + variations. Validé
    // =======================================================================
    public function testlistAction(): void
    {
        LoginAccount::LoginAsUser($this->client);
        $this->client->request('GET', '/tasks');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Task list'); 
    }


    // =======================================================================
    // Tests Fonctionnalities - CRUD - Voter TaskVoter.php + variations.
    // =======================================================================

    // ----------------------------------------------------------------------
    // CREATE ACTION. Title & Content | <>Form Label & Input (for= name=) - validé
    // ----------------------------------------------------------------------
    public function testCreateActionWithAdmin(): void
    {
        LoginAccount::LoginAsAdmin($this->client);

        $crawler = $this->client->request('GET', '/tasks/create');
        //Voter
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        //Verifiction du formulaire de création. Node values (selector).
        //Source html : <label for="task_title" class="required">Title</label>
        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());

        //Source html : <input type="text" id="task_title" name="task[title]" required="required" />
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());

        //Source html : <label for="task_content" class="required">Content</label>
        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        //Acceder au fomulaire.
        $formObjet = $crawler->selectButton('Submit')->form();
        
        // $formObjet['task[title]'] = 'New Task title for funcional testing.';
        // $formObjet['task[content]'] = 'New Task content for funcional testing.';
        
        //<form name="task"  name="task[title]
        $formObjet['task[title]'] = $this->faker->word();
        $formObjet['task[content]'] = $this->faker->paragraph();   //erreur ici   
        $this->client->submit($formObjet);

        $crawler = $this->client->followRedirect();

        // redirect page task
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); //url task
        // et Statut create 201

        //Flash  <div class="alert alert-success" role="alert"> <strong>Nice !</strong> New Task it done. </div>
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());  
        $this->assertSelectorTextContains('h1', 'Task list'); //h1 page
    }
    
    // ----------------------------------------------------------------------
    // EDIT ACTION. | Validé
    // ----------------------------------------------------------------------
    public function testEditTaskAction(): void
    {
        LoginAccount::LoginAsAdmin($this->client);
        $crawler = $this->client->request('GET', '/tasks/1/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        //Verif form elements.

        // Source html: <label for="task_title" class="required">Title</label>
        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());
        // Source html: <input type="text" id="task_title" name="task[title]" required="required" value="sdfsdf" />
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());

        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        //Soumission
        $formObjet = $crawler->selectButton('Update')->form();
        $formObjet['task[title]'] = $this->faker->word();
        $formObjet['task[content]'] = $this->faker->sentence();// invalidargumentexception "content"
        $this->client->submit($formObjet);


        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        //Alert
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());    
        $this->assertSelectorTextContains('h1', 'Task list'); 
    }   

    // ----------------------------------------------------------------------
    // DELETE ACTION. | Validé
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testDeleteTaskAction()
    {  
        LoginAccount::LoginAsAdmin($this->client);
        $crawler = $this->client->request('GET', '/tasks/27/delete');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND); 
        $crawler = $this->client->followRedirect();

        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());
        $this->assertSelectorTextContains('h1', 'Task list');     
    }    

    // ----------------------------------------------------------------------
    // TOOGLE ACTION. | Validé
    // ----------------------------------------------------------------------
    // 1 - 
    public function testToggleTaskAction(): void
    {
        LoginAccount::LoginAsAdmin($this->client);   
  
        $this->client->request('GET', '/tasks/1/toggle');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());

    }
    public function testToogle()
    {
        LoginAccount::LoginAsUser($this->client);
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND); 
        //click button action {od}
    }
}
