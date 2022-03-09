<?php
declare(strict_types = 1); 
namespace App\Tests;

use App\Tests\Traits\LoginAsAdminOrUser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - FONCTIONALITIES DOCUMENTATION
 */
class TaskControllerTest extends WebTestCase
{
    use LoginAsAdminOrUser;

    private $client;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function tearDown(): void
    {
        $this->client = null;
    }


    // =======================================================================
    // Tests Home Page + variations.
    // =======================================================================
    // 1 - Expected: 200 
    public function testlistAction(): void
    {
        $this->LoginAsUser();
        $this->client->request('GET', '/tasks');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('title', 'message' );
    }

    
    // =======================================================================
    // Tests Fonctionnalities - CRUD - Voter TaskVoter.php + variations.
    // =======================================================================

    // ----------------------------------------------------------------------
    // CREATE ACTION. Title & Content | <>Form Label & Input (for= name=)
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User or Admin.
    public function testcreateAction(): void
    {
        $this->LoginAsUser();

        $crawler = $this->client->request('GET', '/tasks/create');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        //Verifiction du formulaire de création. Node values (selector).
        //Source html : <label for="task_title" class="required">Title</label>
        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());

        //Source html : <input type="text" id="task_title" name="task[title]" required="required" />
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());

        //Source html : <label for="task_content" class="required">Content</label>
        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());


        //Soumission > VOIR DOCUMENTATION
        $form = $crawler->selectButton('Ajouter')->form();

        $form['task[title]'] = 'New Task title for funcional testing.';
        $form['task[content]'] = 'New Task content for funcional testing.';

        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $crawler = $this->client->followRedirect();

        //Create Task Form (complet 2 fields & submit).
        //Page title must be <title></title>

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
        //Flash
        $this->assertSelectorTextContains('title', 'text' );
    }
    
    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized User.


    // ----------------------------------------------------------------------
    // EDIT ACTION (User). Title & Content | <>Form Label & Input (for= name=)
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testEditAction(): void
    {
        //connecte l'utilisateur id
        $this->LoginAsAdmin();

        //Task {id}
        $crawler = $this->client->request('GET', '/admin/tasks/' . random_int(1, 6) . '/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

        //Verification des elements du formulaire.
        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());

        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        $form = $crawler->selectButton('Update')->form();

        $form['task[title]'] = 'Here new title for functional testing.';
        $form['task[content]'] = 'Here new content for functional testing.';

        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //Flash
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());    
    }   

    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized User. bg

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

    // 2 - 
    // 3 -
}
