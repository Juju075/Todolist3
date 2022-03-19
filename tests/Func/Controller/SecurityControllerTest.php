<?php
declare(strict_types = 1); 
namespace App\Tests;

use App\Repository\UserRepository;
use App\Tests\security\LoginAccount;
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
        parent::setUp();
        $this->client = static::createClient();
    }

    public function testLoginUrlExist(): void
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Please sign in');
    }

    // =======================================================================
    // LOGIN AS USER  + variations. | Email & Password - input[type=submit] - Validé
    // =======================================================================    
    // 1 - Expected: 200 with User ['ROLE_USER'] Good credentials.
    public function testLoginWithUser(): void
    {
        $crawler = $this->client->request('GET', 'login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Please sign in');    

        //Traversing $crawler->fiter(input[type=submit]); that match the CSS selector.
    
            //Source html : <input type="email" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus />
            $this->assertEquals(1, $crawler->filter('input[name="email"]')->count());
            //Source html : <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required />
            $this->assertEquals(1, $crawler->filter('input[name="password"]')->count());
            //Source html : <input type="hidden" name="_csrf_token"value="151c9094600311530f17a494.93-qQe0Fk2kCA4y_xFfKWcnbVKUMUZs7pdfMC78ndN0.kzjbJo5_0CRWZaGIhT2ZHPCIMJBEOsQMyL7_c-d9IbeAGek22jDAJ3Fy2Q" />
            $this->assertEquals(1, $crawler->filter('input[name="_csrf_token"]')->count());

        //Recupere l'Objet form pour le remplir.
        $formObject = $crawler->selectButton('Sign in')->form(
         [
             'email'=> 'john.doe@testexample.com',
             'password'=> 'identique'
         ]   
        );

        //Interacting with Response 
        $this->client->followRedirects();
        $this->client->submit($formObject);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        
        $this->assertSelectorTextContains('h1', 'Task list'); 
    }

    // 1 - Expected: 200 with Admin ['ROLE_ADMIN'] Good credentials. validé
    public function testLoginWithAdmin(): void
    {
        $crawler = $this->client->request('GET', 'login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Please sign in');    

        //Traversing $crawler->fiter(input[type=submit]); that match the CSS selector.
    
            //Source html : <input type="email" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus />
            $this->assertEquals(1, $crawler->filter('input[name="email"]')->count());
            //Source html : <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required />
            $this->assertEquals(1, $crawler->filter('input[name="password"]')->count());
            //Source html : <input type="hidden" name="_csrf_token"value="151c9094600311530f17a494.93-qQe0Fk2kCA4y_xFfKWcnbVKUMUZs7pdfMC78ndN0.kzjbJo5_0CRWZaGIhT2ZHPCIMJBEOsQMyL7_c-d9IbeAGek22jDAJ3Fy2Q" />
            $this->assertEquals(1, $crawler->filter('input[name="_csrf_token"]')->count());

        //Recupere l'Objet form pour le remplir.
        $formObject = $crawler->selectButton('Sign in')->form(
         [
             'email'=> 'admin@todolist.com',
             'password'=> 'identique'
         ]   
        );

        //Interacting with Response 
        $this->client->followRedirects();
        $this->client->submit($formObject);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Task list'); 
    }


    // 3 - Expected: no found  with  Bad Credentials.
    public function testLoginWithBadPassword(): void
    {
        $crawler = $this->client->request('GET', 'login');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Please sign in');    

        //Traversing $crawler->fiter(input[type=submit]); that match the CSS selector.
    
            //Source html : <input type="email" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus />
            $this->assertEquals(1, $crawler->filter('input[name="email"]')->count());
            //Source html : <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required />
            $this->assertEquals(1, $crawler->filter('input[name="password"]')->count());
            //Source html : <input type="hidden" name="_csrf_token"value="151c9094600311530f17a494.93-qQe0Fk2kCA4y_xFfKWcnbVKUMUZs7pdfMC78ndN0.kzjbJo5_0CRWZaGIhT2ZHPCIMJBEOsQMyL7_c-d9IbeAGek22jDAJ3Fy2Q" />
            $this->assertEquals(1, $crawler->filter('input[name="_csrf_token"]')->count());

        //Recupere l'Objet form pour le remplir.
        $formObject = $crawler->selectButton('Sign in')->form(
         [
             'email'=> 'ici@ici.com',
             'password'=> 'badpassword'
         ]   
        );

        //Interacting with Response - Clicing on links. - Soumission
        $this->client->followRedirects();
        $this->client->submit($formObject);
        
        //Assertion. ATTENTION 500 Internal error si le credential est inconnu.
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        
        //Message d'erreur Invalid credentials. <div class="alert alert-danger">Invalid credentials.</div>
        $this->assertSame('Invalid credentials.', $crawler->filter('alert alert-danger')->text());        
    }
    
    // =======================================================================
    // LOGOUT + variations.
    // =======================================================================
    
    // 1 - Expected: 200 with User ['ROLE_ADMIN']
    public function testLogout():void
    {
        loginAccount::LoginAsUser($this->client);
        
        $crawler = $this->client->request('GET', 'logout');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->client->followRedirects();
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->assertSelectorTextContains('h1', 'Homepage');  
      }
}



