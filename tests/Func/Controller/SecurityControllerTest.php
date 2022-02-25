<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test credentials 
 */
class SecurityControllerTest extends WebTestCase
{

    //setup()
    private $client;
    private $crawler;
    private $id = 1;
    
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


    //Refactoring 
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

    public function testLoginWithBadPassword()
    {
        $this->testLoginWithRighCredentials('badPassword');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //message
    }

    public function testLoginWithBadUsername()
    {

    }

      public function testLogout()
    {
        $this->getCrawler('GET', '/logout');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertResponseRedirects();
        $this->assertSelectorTextContains();
    }
}