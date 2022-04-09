<?php
declare(strict_types = 1); 
namespace App\Tests\security;


use App\Entity\Task;
use App\Security\Voter\TaskVoter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class TaskVoterTest extends WebTestCase
{
    private $client;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
    }

    // ======================================================================
    // __construct() > supports() > voteOnAttribute()
    // TaskVoterTest::voteOnAttribute() |  | Assert  [validé]
    // ====================================================================== 
    public function testvoteOnAttributeAsAdmin(){
        LoginAccount::LoginAsAdmin($this->client);

        //declenche le voter  TASK_CREATE
        $this->client->request('GET', '/tasks/create"');
        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);        
    }


    // ----------------------------------------------------------------------
    // TaskVoterTest::userCanDelete() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 
    public function testUserCanDeleteAsAdmin(){
        LoginAccount::LoginAsAdmin($this->client);

        //declenche le voter  TASK_DELETE
        $this->client->request('GET', '/tasks/1/delete"');
        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND); 

        //Assert si le return est true alors ok


    }
    // ----------------------------------------------------------------------
    // TaskVoterTest::userCanEdit() |  | Assert  []
    // ---------------------------------------------------------------------- 
    public function testUserCanEditAsAdmin(){
        LoginAccount::LoginAsAdmin($this->client);

        //declenche le voter  TASK_EDIT
        $this->client->request('GET', '/tasks/1/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND); 
    }
    // ----------------------------------------------------------------------
    // TaskVoterTest::userCanToogle() |  | Assert  [validé]
    // ---------------------------------------------------------------------- 
    //  vas etre declenche automatiquement ?    
    public function testUserCanToogleAsAdmin(){
        LoginAccount::LoginAsAdmin($this->client);

        //declenche le voter  TASK_TOGGLE
        $this->client->request('GET', '/tasks/1/toggle');
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND); 
    }    
}