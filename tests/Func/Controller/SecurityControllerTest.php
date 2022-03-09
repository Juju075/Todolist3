<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - SECURITY DOCUMENTATION
 * Sur quel bdd 
 */
class SecurityControllerTest extends WebTestCase
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

    // =======================================================================
    // LOGIN AS USER  + variations. | Email & Password - Label & Input[name=" "]
    // ======================================================================= 
    // 1 - Expected: 200 with User ['ROLE_USER'] Good credentials.
    public function testLoginWithRighCredentials()
    {

        $crawler = $this->client->request('GET', 'login');

        //Assertion - [Verification des elements du formulaire.]

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        
        //Source html : <label for="inputEmail">Email</label>
        //Source html : <label for="inputPassword">Password</label>
        
        //Source html : <input type="email" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus />
        $this->assertEquals(1, $crawler->filter('input[name="email"]')->count());
        //Source html : <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required />
        $this->assertEquals(1, $crawler->filter('input[name="password"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="_csrf_token"]')->count());

        $crawler->selectButton('Sign in');
        
        //Source html : <label for="inputEmail">Email</label>
        //Source html : <input type="email" value="suzanne43@sfr.fr" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus />
        $form = $crawler->form([
            'input[name="email"]'=>'marianne34@hotmail.fr',
            'input[name="password"]'=> 'identique'
        ]);
        
        //Nouvelle requete
        $this->client->submit($form);
        echo $this->client->getResponse()->getContent();

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //
        //message success
        //$this->assertSame('Se déconnecter', $crawler->filter('a.pull-right.btn.btn-danger')->text());

    }

    // 2 - Expected:   with User ['ROLE_USER'] Bad Credentials.
    public function testLoginWithBadPassword()
    {
        $crawler = $this->client->request('GET', 'login');
        $crawler->selectButton('Sign in');
        
        $form = $crawler->form([
            'Email'=>'marianne34@hotmail.fr',
            'Password'=> 'identiqdudde'
        ]);
        
        //Nouvelle requete
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //Message d'erreur Invalid credentials. <div class="alert alert-danger">Invalid credentials.</div>
        $this->assertSame('Invalid credentials.', $crawler->filter('alert alert-danger')->text());
    }

    public function testLoginWithBadUsername()
    {
        $crawler = $this->client->request('GET', 'login');
        $crawler->selectButton('Sign in');
        
        $form = $crawler->form([
            'Email'=>'marianne34@hotmaiddddl.fr',
            'Password'=> 'identique'
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
        $crawler = $this->client->request('GET', 'logout');
   
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains();
      }
}
