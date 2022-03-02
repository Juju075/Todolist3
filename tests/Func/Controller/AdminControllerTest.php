<?php
declare(strict_types = 1);
namespace App\Tests;

use App\Tests\Traits\Initialization;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * APP TODOLIST - BACKOFFICE DOCUMENTATION
 */
class AdminControllerTest extends WebTestCase
{
    //use Initialization;
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
    // Tests BackOffice pages. [Not implemented]
    // ======================================================================= 
    
    // ----------------------------------------------------------------------
    // Index Page 
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
    
    public function testListAction(): void
    {
        
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
        $crawler = $this->client->request('GET', '/admin');
    }

    // ----------------------------------------------------------------------
    // EDIT USER ACTION [Not implemented]
    // ----------------------------------------------------------------------


    // ----------------------------------------------------------------------
    // DELETE USER ACTION [Not implemented]
    // ----------------------------------------------------------------------





}
