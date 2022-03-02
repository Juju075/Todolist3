<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - FONCTIONALITIES DOCUMENTATION
 */
class TaskControllerTest extends WebTestCase
{
    private $client;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function tearDown(): void
    {
        $this->client = null;
    }


    // ----------------------------------------------------------------------
    // LOGIN AS ADMIN: | Bdd empty Admin
    // ----------------------------------------------------------------------
    public function LoginAsAdmin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['username' => 'admin', 'password' => 'identique']);
    }

    // ----------------------------------------------------------------------
    // LOGIN AS USER: | Credentials suzanne43@sfr.fr  identique
    // ----------------------------------------------------------------------
    public function LoginAsUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['username' => 'suzanne43@sfr.fr', 'password' => 'identique']);
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
        $form['task[title]'] = 'Test Super titre de tache';
        $form['task[content]'] = 'Test Contenu de la supertache blablabla.';
        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $crawler = $this->client->followRedirect();

        //Create Task Form (complet 2 fields & submit).
        //Page title must be <title></title>

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
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

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Test modification du Super titre de tache';
        $form['task[content]'] = 'Test modification du contenu de la supertache blablabla.';
        $this->client->submit($form);

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());    
    }   

    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized User.

    // ----------------------------------------------------------------------
    // DELETE ACTION.
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testDeleteTaskAction()
    {  
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);       
    }    

    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized Use.

    // ----------------------------------------------------------------------
    // TOOGLE ACTION + variations.
    // ----------------------------------------------------------------------
    // 1 - 
    public function testToggleTaskAction(): void
    {
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);     
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
