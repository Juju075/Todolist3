<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test pertinents - Approche fonctionnel
 * Requete reponse
 */
class TaskControllerTest extends WebTestCase
{

    private $client;
    private $id;
    private $crawler;

    public function setuP(): void
    {
        $client = static::createClient();
        $this->id = 1; //utilisateur connecte (user ou admin)
    }

    public function tearDown(): void
    {
        $this->client = null;
        $this->id = null;
        $this->crawler = null;
    }

    /**
     * The request() method returns a Symfony\Component\DomCrawler\Crawler 
     * object which can be used to select elements in the response.
     *
     * @param string $method
     * @param string $url
     * @return void
     */
    public function getCrawler(string $method, string $url): void
    {
        $this->crawler = $this->client->request($method, $url);
    }


    public function testLoginAsAdmin(): void
    {
        //Form Login     
        //assertion message 'Your are logged in as ADMIN'
    }

    public function testLoginAsUser(): void
    {
        //Form Login
        //assertion message 'Your are logged in as USER'
    }


    public function testlistAction(): void
    {
        $this->getCrawler('GET', '/tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testcreateAction(): void
    {

        $this->getCrawler('POST', '/tasks/create');
        $crawler = $this->client->followRedirect();

        //Create Task Form (complet 2 fields & submit).
        //Page title must be <title></title>

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
        $this->assertSelectorTextContains('title', 'text' );
    }


    public function testEditAction(): void
    {
        //connecte l'utilisateur id
        $this->getCrawler('UPDATE', '/tasks//'. $this->id .'/edit');
        $crawler = $this->client->followRedirect();
         
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);      
    }

    public function testToggleTaskAction(): void
    {
        $this->getCrawler('GET', '/tasks//'. $this->id .'/toggle');
        $crawler = $this->client->followRedirect();
          
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);     
    }

    public function testDeleteTaskAction()
    {
        $this->getCrawler('DELETE', '/tasks//'. $this->id .'/delete');
        $crawler = $this->client->followRedirect();
         
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);       
    }

    public function testAllIsDoneTask()
    {
        $this->getCrawler('GET', '/task/isdone');
        $crawler = $this->client->followRedirect();
        
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
