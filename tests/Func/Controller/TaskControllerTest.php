<?php
declare(strict_types = 1); 
namespace App\Tests;

use App\Tests\Traits\LoginAsAdminOrUser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Faker;

/**
 * APP TODOLIST - FONCTIONALITIES DOCUMENTATION
 */
class TaskControllerTest extends WebTestCase
{
    use LoginAsAdminOrUser;

    private $client;
    private $faker;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function tearDown(): void
    {
        $this->client = null;
    }


    // =======================================================================
    // Tests Home Page + variations. Validé
    // =======================================================================
    // 1 - Expected: 200 
    public function testlistAction(): void
    {
        $this->LoginAsUser();
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
    // 1 - Expected: 200 OK with authorized User or Admin.
    public function testCreateActionWithAdmin(): void
    {
        $this->LoginAsAdmin(); //

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
        $formObjet['task[title]'] = $this->faker->title();
        $formObjet['task[content]'] = $this->faker->paragraph();        
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
    // EDIT ACTION (User). Title & Content | <>Form Label & Input (for= name=)
    // Voter desactive
    // >>> Actuellement en Test <<<< Le voter block
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testEditTaskAction(): void
    {
        //connecte l'utilisateur id
        $this->LoginAsUser();
        $crawler = $this->client->followRedirect();
        $this->assertSelectorTextContains('h1', 'Task list');
        
        //$this->client->request('GET', '/admin/tasks/' .'8'. '/edit');
        // Ici le Voter block  #[IsGranted('TASK_CREATE', subject: 'task')]
        //$this->assertResponseStatusCodeSame(Response::HTTP_OK); 
        
        
        // //uniquement si task existe
        // if ($this->client->request('GET', '/admin/tasks/' .'1'. '/edit')) {
        $crawler = $this->client->request('GET', '/admin/tasks/' . '1'. '/edit');
        var_dump($crawler);

        //Attention NOT_FOUND 
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        //Verification des elements du formulaire.
        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());

        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        $formObjet = $crawler->selectButton('Update')->form();

        $formObjet['task[title]'] = $this->faker->title();
        $formObjet['task[content]'] = $this->faker->content();

        $this->client->submit($formObjet);


        // $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        // $crawler = $this->client->followRedirect();
        // $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        // //Flash 
        // $this->assertEquals(1, $crawler->filter('div.alert-success')->count());    
        // $this->assertSelectorTextContains('h1', 'Task list'); 
        // }else{
        //   $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);   
        //   //no task yet

    }   

    // ----------------------------------------------------------------------
    // DELETE ACTION.
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testDeleteTaskAction()
    {  
        $this->LoginAsUser();

        $id =21;
        //$this->client->request('GET', '/tasks/2'. $id.'/delete');

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());    
    
    }    

    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized Use.

    // ----------------------------------------------------------------------
    // TOOGLE ACTION.
    // ----------------------------------------------------------------------
    // 1 - 
    public function testToggleTaskAction(): void
    {
        $this->LoginAsUser();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);     
  
        $this->client->request('GET', '/tasks/1/toggle');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND); 

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());

    }

    // =======================================================================
    // Tests ALLISDONE + variations.
    // =======================================================================
    // 1 - 
    public function testAllIsDoneTask()
    {
        $crawler = $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }   

}
