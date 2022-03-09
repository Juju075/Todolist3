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
    public function testIndexAdminNotLogged(): void
    {
        $crawler = $this->client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->assertResponseRedirects('/login');

    }

    // 2 - Expected: 200 with User logged and Redirection
    public function tesIndexAdminLogged(): void
    {
        //Se connecter ['ROLE_ADMIN']
        $crawler = $this->client->request('GET', 'login');
        $crawler->selectButton('Sign in');
        
        $form = $crawler->form([
            'Email'=>'marianne34@hotmail.fr',
            'Password'=> 'identique'
        ]);
        
        //Requete
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
    // CREATE USER ACTION
    // ----------------------------------------------------------------------
    // 1 - Expected: 
    public function testCreateAction(): void
    {
        $this->LoginAsAdmin();

        $crawler = $this->client->request('GET', '/admin/users/create');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        //Verification label
        $this->assertSame('Nom d\'utilisateur', $crawler->filter('label[for="user_username"]')->text());
        $this->assertSame('Mot de passe', $crawler->filter('label[for="user_password_first"]')->text());
        $this->assertSame('Adresse email', $crawler->filter('label[for="user_email"]')->text());

        //Verification input    
        $this->assertEquals(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertEquals(2, $crawler->filter('input[name="user[roles][]"]')->count());

        //Form
        $form = $crawler->selectButton('Ajouter')->form();

        $form['user[username]'] = 'boby';
        $form['user[password][first]'] = 'azerty';
        $form['user[password][second]'] = 'azerty';
        $form['user[email]'] = 'newUser@example.org';
        $form['user[roles][0]']->tick();

        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());
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
