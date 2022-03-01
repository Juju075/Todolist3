<?php

namespace App\Tests\Traits;

    trait Initialization
    {
    private $client;
    private $crawler;
    private $id = 1;
    
    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->id = 1; //utilisateur connecte (user ou admin)
    }

    /**
     * The request() method returns a Symfony\Component\DomCrawler\Crawler 
     * object which can be used to select elements in the response.
     *
     * @param string $method
     * @param string $url
     * @return void
     */
    public function getCrawler(string $method, string $url): void
    {
        $client = static::createClient();

        $this->client = $client;
        $this->crawler = $client->request($method, $url);
    }
}
