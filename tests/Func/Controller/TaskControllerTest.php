<?php
declare(strict_types = 1); 
namespace App\Tests;

use App\Tests\Traits\Initialization;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - FONCTIONALITIES DOCUMENTATION
 */
class TaskControllerTest extends WebTestCase
{
    use Initialization;

    // =======================================================================
    // Tests Login + variations.
    // ======================================================================= 

    // ----------------------------------------------------------------------
    // LOGIN AS ADMIN
    // ----------------------------------------------------------------------
    public function testLoginAsAdmin(): void
    {
        //Form Login     
        //assertion message 'Your are logged in as ADMIN'
    }

    // ----------------------------------------------------------------------
    // LOGIN AS USER
    // ----------------------------------------------------------------------
    public function testLoginAsUser(): void
    {
        //Form Login
        //assertion message 'Your are logged in as USER'
    }


    // =======================================================================
    // Tests Home Page + variations.
    // =======================================================================
    // 1 - Expected: 200 
    public function testlistAction(): void
    {
        $this->getCrawler('GET', '/tasks');
        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('title', 'message' );
    }

    
    // =======================================================================
    // Tests Fonctionnalities - CRUD - Voter TaskVoter.php + variations.
    // =======================================================================

    // ----------------------------------------------------------------------
    // CREATE ACTION.
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User or Admin.
    public function testcreateAction(): void
    {

        $this->getCrawler('POST', '/tasks/create');
        $crawler = $this->client->followRedirect();

        //Create Task Form (complet 2 fields & submit).
        //Page title must be <title></title>

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
        $this->assertSelectorTextContains('title', 'text' );
    }
    
    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized User.


    // ----------------------------------------------------------------------
    // EDIT ACTION (User).
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testEditAction(): void
    {
        //connecte l'utilisateur id
        $this->getCrawler('UPDATE', '/tasks//'. $this->id .'/edit');
        $crawler = $this->client->followRedirect();
         
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);      
    }   

    // 2 - Expected: 200 OK with Admin.

    // 3 - Expected: NO with unauthorized User.

    // ----------------------------------------------------------------------
    // DELETE ACTION.
    // ----------------------------------------------------------------------
    // 1 - Expected: 200 OK with authorized User.
    public function testDeleteTaskAction()
    {
        $this->getCrawler('DELETE', '/tasks//'. $this->id .'/delete');
        $crawler = $this->client->followRedirect();
         
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
        $this->getCrawler('GET', '/tasks//'. $this->id .'/toggle');
        $crawler = $this->client->followRedirect();
          
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);     
    }

    // =======================================================================
    // Tests ALLISDONE + variations.
    // =======================================================================
    // 1 - 
    public function testAllIsDoneTask()
    {
        $this->getCrawler('GET', '/task/isdone');
        $crawler = $this->client->followRedirect();
        
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }   

    // 2 - 
    // 3 -
}
