<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemoTest extends WebTestCase
{
    /**
     * Acceder a une url existante ou inconnu
     * Assertion status code 200
     *
     */
    public function testUrlExist(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/login');

        // Validate a successful response and some content
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorTextContains('h1', 'Please sign in');
    }


    /**
     * Acceder a une url existante ou inconnu
     * Assertion status code 200
     *
     */
    public function testUrlNotExist(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/logind');
        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    }

}
