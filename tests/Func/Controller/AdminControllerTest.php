<?php
declare(strict_types = 1);
namespace App\Tests;

use App\Tests\Traits\LoginAsAdminOrUser;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - BACKOFFICE DOCUMENTATION
 */
class AdminControllerTest extends WebTestCase
{
    use LoginAsAdminOrUser;


    private $client;
    
    public function setUp(): void
    {
        //Boot the kernel.
        $this->client = static::createClient();
    }

    public function tearDown(): void
    {
        $this->client = null;
    }

    // =======================================================================
    // Tests BackOffice pages. [Not implemented] Security
    // ======================================================================= 
    
    // ----------------------------------------------------------------------
    // Index Page Security Firewall
    // ----------------------------------------------------------------------
    
    // 1 - Expected: 200 with Admin logged.
    public function testBackOfficeAuthorization(): void
    {
        $this->LoginAsAdmin(); //Security.yaml(ROLE_ADMIN) - ok
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->request('GET', '/admin');
        $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Admin index');
    }

    // 2 - Expected: 400 with Admin logged.
    public function testBackOfficeAuthorizationWithNotAdmin(): void
    {
        $this->LoginAsUser(); //
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Admin index');
    }


    // =======================================================================
    // Tests Functionnalities. CRUD
    // ======================================================================= 

    // ----------------------------------------------------------------------
    // SHOW USER ACTION [Not implemented]
    // ----------------------------------------------------------------------

    // ----------------------------------------------------------------------
    // CREATE USER ACTION - Mettre en plac DAMA
    // ----------------------------------------------------------------------
    // 1 - Expected: 
    public function testCreateAction(): void
    {
        $this->LoginAsAdmin();

        $crawler = $this->client->request('GET', '/admin/users/create');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Create an User');

        //Verification label
        $this->assertSame('Username', $crawler->filter('label[for="user_username"]')->text());
        $this->assertSame('Password', $crawler->filter('label[for="user_password_first"]')->text());
        $this->assertSame('Email', $crawler->filter('label[for="user_email"]')->text());

        //Verification input    
        $this->assertEquals(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[email]"]')->count());
        //Droplist
        //$this->assertEquals(1, $crawler->filter('input[name="user[roles][]"]')->count());

        //Form
        $formObject = $crawler->selectButton('Submit')->form();

        $formObject['user[username]'] = 'boby';
        $formObject['user[password][first]'] = 'azerty';
        $formObject['user[password][second]'] = 'azerty';
        $formObject['user[email]'] = 'newUser@example.org';

        $formObject['user[roles][0]']->tick(); //tick a checkbox

        // $this->client->submit($form);

        // $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        // $crawler = $this->client->followRedirect();

        // $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        // $this->assertEquals(1, $crawler->filter('div.alert-success')->count());
    }

    // ----------------------------------------------------------------------
    // EDIT USER ACTION [Not implemented]
    // ----------------------------------------------------------------------

    public function testEditeAction(): void
    {
        $this->LoginAsAdmin();

        $crawler = $this->client->request('GET', '/admin/users/4/edit');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame('Nom d\'utilisateur', $crawler->filter('label[for="user_username"]')->text());
        $this->assertSame('Mot de passe', $crawler->filter('label[for="user_password_first"]')->text());
        $this->assertSame('Adresse email', $crawler->filter('label[for="user_email"]')->text());

        $this->assertEquals(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertEquals(2, $crawler->filter('input[name="user[roles][]"]')->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'bobynight';
        $form['user[password][first]'] = 'root';
        $form['user[password][second]'] = 'root';
        $form['user[email]'] = 'newUser@example.org';
        $form['user[roles][0]']->tick();
        $this->client->submit($form);

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());

    }
    // ----------------------------------------------------------------------
    // DELETE USER ACTION [Not implemented]
    // ----------------------------------------------------------------------





}
