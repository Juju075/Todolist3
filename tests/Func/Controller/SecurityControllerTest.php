<?php
declare(strict_types = 1); 
namespace App\Tests;

use App\Tests\Traits\Initialization;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - SECURITY DOCUMENTATION
 */
class SecurityControllerTest extends WebTestCase
{
    use Initialization;

    // =======================================================================
    // LOGIN AS USER  + variations.
    // ======================================================================= 
    // 1 - Expected: 200 with User ['ROLE_USER'] Good credentials.
    public function testLoginWithRighCredentials()
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

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //message success
        //$this->assertSame('Se déconnecter', $crawler->filter('a.pull-right.btn.btn-danger')->text());

    }

    // 2 - Expected:   with User ['ROLE_USER'] Bad Credentials.
    public function testLoginWithBadPassword()
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

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        //message
    }

    public function testLoginWithBadUsername()
    {
        $this->getCrawler('GET', '/login');

        $this->crawler->selectButton('Login');
        $form = $this->crawler->form([
            'email'=>'wrong@gmail.com',
            'password'=> 'identique'
        ]);
        //Nouvelle requete
        $this->client->submit($form);

        $crawler = $this->client->followRedirect();
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
