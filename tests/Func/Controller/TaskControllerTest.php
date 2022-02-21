<?php
declare(strict_types = 1); 
namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test pertinents - Approche fonctionnel
 * Requete reponse
 */
class TaskControllerTest extends WebTestCase
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

    //Refactoring


    public function testlistAction(): void
    {
        $this->getCrawler('GET', '/tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testcreateAction(): void
    {
        $this->getCrawler('POST', '/tasks/create');

        //Form create task (remplir les fields)

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
    }


    public function testEditAction(int $id): void
    {
        $this->getCrawler('UPDATE', '/tasks//'. $id .'/edit');
    }

    public function testToggleTaskAction(int $id): void
    {
        $this->getCrawler('GET', '/tasks//'. $id .'/toggle');
    }

    public function testDeleteTaskAction(int $id)
    {
        $this->getCrawler('DELETE', '/tasks//'. $id .'/delete');
    }

    public function testAllIsDoneTask()
    {
        $this->getCrawler('GET', '/task/isdone');
    }
}
