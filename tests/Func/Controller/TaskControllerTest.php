<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{

    //Refactoring


    public function testlistAction(): void
    {
        $client = static::createClient();
        //Request
        $crawler = $client->request('GET', '/tasks');

        //Code 200 |Si task non empty expected 
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
