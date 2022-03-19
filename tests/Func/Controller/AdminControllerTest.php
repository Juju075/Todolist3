<?php
declare(strict_types = 1);
namespace App\Tests;
use Faker;
use App\Tests\security\LoginAccount;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - BACKOFFICE DOCUMENTATION
 */
class AdminControllerTest extends WebTestCase
{
    //use LoginAsAdminOrUser;  // faire une class 

    private $client;
    private $faker;

    public function setUp(): void
    {
        parent::setUp(); 
        $this->client = static::createClient();
        $this->faker = Faker\Factory::create('fr_FR');
    }

    // =======================================================================
    // Tests BackOffice pages. [Not implemented] Security
    // ======================================================================= 
    
    // ----------------------------------------------------------------------
    // Index Page Security Firewall - validé
    // ----------------------------------------------------------------------
    
    // 1 - Expected: 200 with Admin logged. 
    public function testBackofficeAccessWithAdmin(): void
    {
        LoginAccount::LoginAsAdmin($this->client);
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->request('GET', '/admin');
        $this->client->followRedirect();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Admin index');
    }

    // 2 - Expected: 400 with Admin logged.
    public function testBackofficeAccessWithUser(): void
    {
        LoginAccount::LoginAsUser($this->client);
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $crawler = $this->client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN); //exception
        
        $this->assertEquals(0, $crawler->filter('input[name="user[email]"]')->count());
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
        LoginAccount::LoginAsAdmin($this->client);

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
        $this->assertEquals(1, $crawler->filter('select[name="user[roles]"]')->count());

        //Form
        $formObject = $crawler->selectButton('Submit')->form();

        //name 
        $formObject['user[username]'] = $this->faker->userName();
        $formObject['user[password][first]'] = 'identique';
        $formObject['user[password][second]'] = 'identique';
        $formObject['user[email]'] = $this->faker->freeEmail();
        $formObject['user[roles]']->select(false);
        // Au-dessus validé ---
        
        $this->client->submit($formObject);
        $crawler = $this->client->followRedirect();        

        // $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        // $crawler = $this->client->followRedirect();
        // $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        // $this->assertEquals(1, $crawler->filter('div.alert-success')->count());
    }

    // ----------------------------------------------------------------------
    // EDIT USER ACTION validé
    // ----------------------------------------------------------------------

    public function testEditeAction(): void
    {
        LoginAccount::LoginAsAdmin($this->client);

        $crawler = $this->client->request('GET', '/admin/users/21/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSame('Username', $crawler->filter('label[for="user_username"]')->text());
        $this->assertSame('Password', $crawler->filter('label[for="user_password_first"]')->text());
        $this->assertSame('Type your password', $crawler->filter('label[for="user_password_second"]')->text());
        $this->assertSame('Email', $crawler->filter('label[for="user_email"]')->text());
        $this->assertSame('Select for Admin.', $crawler->filter('label[for="user_roles"]')->text());
        
        $this->assertEquals(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][first]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[password][second]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertEquals(1, $crawler->filter('select[name="user[roles]"]')->count());
        
        //$this->assertEquals(1, $crawler->filter('select[name="user[roles"]')->count()); // Erreur ici

        $form = $crawler->selectButton('Update')->form();

        $form['user[username]'] = $this->faker->userName();
        $form['user[password][first]'] = 'identique2';
        $form['user[password][second]'] = 'identique2';
        $form['user[email]'] = $this->faker->freeEmail();
        $form['user[roles]']->select('0');

        $this->client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $crawler = $this->client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());
    }
}
