<?php
declare(strict_types = 1);
namespace App\Tests\Traits;


Trait LoginAsAdminOrUser 
{
    // ----------------------------------------------------------------------
    // LOGIN AS ADMIN: | Bdd empty Admin
    // ----------------------------------------------------------------------
    public function LoginAsAdmin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['email' => 'admin', 'password' => 'identique']);
    }

    // ----------------------------------------------------------------------
    // LOGIN AS USER: | Credentials suzanne43@sfr.fr  identique
    // ----------------------------------------------------------------------
    public function LoginAsUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('Se connecter')->form();
        $this->client->submit($form, ['email' => 'suzanne43@sfr.fr', 'password' => 'identique']);
    }
}