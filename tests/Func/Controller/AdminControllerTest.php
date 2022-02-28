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
    use Initialization;

    // =======================================================================
    // Tests BackOffice pages. [Not implemented]
    // ======================================================================= 
    
    // ----------------------------------------------------------------------
    // Index Page 
    // ----------------------------------------------------------------------
    
    // 1 - Expected: 200 with Admin logged.
    public function testIndexAdminNotLogged(): void
    {
        $this->getCrawler('GET', '/admin');

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
        $this->assertResponseRedirects('/login');

    }

    // 2 - Expected: 200 with User logged and Redirection
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
        $this->getCrawler('GET', '/tasks/create');
    }

    // ----------------------------------------------------------------------
    // EDIT USER ACTION [Not implemented]
    // ----------------------------------------------------------------------


    // ----------------------------------------------------------------------
    // DELETE USER ACTION [Not implemented]
    // ----------------------------------------------------------------------





}
