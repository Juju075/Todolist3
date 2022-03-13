<?php
declare(strict_types = 1);
namespace App\Tests\Traits;


Trait LoginAsAdminOrUser 
{
    // ----------------------------------------------------------------------
    // LOGIN AS ADMIN: | Credentials admin@todolist.com  identique - validé
    // The test is SecurityControllerTest::testLofinWithAdmin    
    // ----------------------------------------------------------------------
    public function LoginAsAdmin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Sign in')->form();
        $this->client->submit($form, ['email' => 'admin@todolist.com', 'password' => 'identique']);
    }

    // ----------------------------------------------------------------------
    // LOGIN AS USER: | Credentials john.doe@testexample.com  identique - validé
    // The test is SecurityControllerTest::testLofinWithUser
    // ----------------------------------------------------------------------
    public function LoginAsUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $formObject = $crawler->selectButton('Sign in')->form();
        $this->client->submit($formObject, ['email' => 'john.doe@testexample.com', 'password' => 'identique']);
    }
}