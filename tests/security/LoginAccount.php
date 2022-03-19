<?php
declare(strict_types = 1);
namespace App\Tests\security;

class LoginAccount
{
    // ----------------------------------------------------------------------
    // LOGIN AS ADMIN: | Credentials admin@todolist.com  identique - validé
    // The test is SecurityControllerTest::testLofinWithAdmin    
    // ----------------------------------------------------------------------
    public static function LoginAsAdmin($client): void
    {
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Sign in')->form();
        $client->submit($form, ['email' => 'admin@todolist.com', 'password' => 'identique']);
    }

    // ----------------------------------------------------------------------
    // LOGIN AS USER: | Credentials john.doe@testexample.com  identique - validé
    // The test is SecurityControllerTest::testLofinWithUser
    // ----------------------------------------------------------------------
    public static function LoginAsUser($client): void
    {
        $crawler = $client->request('GET', '/login');
        $formObject = $crawler->selectButton('Sign in')->form();
        $client->submit($formObject, ['email' => 'john.doe@testexample.com', 'password' => 'identique']);
    }
}