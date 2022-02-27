<?php
declare(strict_types = 1);
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - BACKOFFICE DOCUMENTATION
 */
class AdminControllerTest extends WebTestCase
{
    private $client;
    private $crawler;

    public function setUp(): void
    {
        $this->client = static::createClient();
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

    // =======================================================================
    // Tests Index page + variations.
    // ======================================================================= 
    // 1 - Expected: 200 with Admin logged.
    public function testIndexAdminNotLogged(): void
    {
        $this->getCrawler('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->assertResponseRedirects('/login');

    }

    // 1 - Expected: 200 with User logged and Redirection

    public function tesIndexAdminLogged(): void
    {
        //Se connecter
        $this->logAsAdmin();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'text ici');

        $this->getCrawler('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'text ici');
    }

    public function testListAction(): void
    {
        
    }

//createAction [ Form ]
    public function testCreateAction(): void
    {
        $this->getCrawler('GET', '/tasks/create');
    }

//showAction

}
