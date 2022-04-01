<?php

namespace App\Tests\Func\Repository;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TaskRepositoryTest extends KernelTestCase
{
private $entityManager ;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    //test de querie
    public function testSearchBy(): void
    {
        //on recupere l'entite
        $task = $this->entityManager
            ->getRepository(Task::class)
            ->findOneBy(['title'=>'deleniti'])
            ;

        $this->assertSame('deleniti', $task->getTitle());
    }
}
