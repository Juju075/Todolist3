<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - SECURITY DOCUMENTATION
 */
class SecurityControllerTest extends WebTestCase
{
    private $client;
    private $crawler;
    private $id = 1;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->id = 1; //utilisateur connecte (user ou admin)
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
        $client = static::createClient();

        $this->client = $client;
        $this->crawler = $client->request($method, $url);
    }

    // =======================================================================
    // LOGIN AS USER  + variations.
    // ======================================================================= 
    // 1 - Expected: 200 with User ['ROLE_USER'] Good credentials.
    public function testLoginWithRighCredentials($password = 'identique')
    {
        $this->getCrawler('GET', '/login');

        $this->crawler->selectButton('Login');
        $form = $this->crawler->form([
            'email'=>'test@gmail.com',
            'password'=> $password
        ]);
        //Nouvelle requete
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //message success
        //$this->assertSame('Se déconnecter', $crawler->filter('a.pull-right.btn.btn-danger')->text());

    }

    // 2 - Expected:   with User ['ROLE_USER'] Bad Credentials.
    public function testLoginWithBadPassword()
    {
        $this->testLoginWithRighCredentials('badPassword');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //message
    }

    public function testLoginWithBadUsername()
    {

    }

    // ======================================================================= 
    // LOGIN AS ADMIN + variations.
    // ======================================================================= 
    // 1 - Expected: 200 with User ['ROLE_ADMIN']
    public function logAsAdmin()
    {
        $this->getCrawler('GET', '/login');

        $this->crawler->selectButton('Login');
        $form = $this->crawler->form([
            'email'=>'test@gmail.com',
            'password'=> 'identique'
        ]);
        //Nouvelle requete
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

    }

    // 2 - Expected: 200 Unauthorized with bad credential.
    public function logAsAdminWithBadCredential()
    {
        $this->getCrawler('GET', '/login');

        $this->crawler->selectButton('Login');
        $form = $this->crawler->form([
            'email'=>'test@gmail.com',
            'password'=> 'identique'
        ]);
        //Nouvelle requete
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

    }

    // =======================================================================
    // LOGOUT + variations.
    // =======================================================================

    // 1 - Expected: 200 with User ['ROLE_ADMIN']
      public function testLogout()
    {
        $this->getCrawler('GET', '/logout');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains();
    }
}
