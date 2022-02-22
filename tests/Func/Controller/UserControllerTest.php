<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    private $crawler;
    private $id = 1;
    
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
        //Request
        $this->crawler = $client->request($method, $url);
    }

    //listAction
    public function testListAction(): void
    {

    }
    //createAction
    //editAction
}