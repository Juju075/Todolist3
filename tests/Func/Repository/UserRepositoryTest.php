<?php

namespace App\Tests\Func\Repository;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
private $entityManager ;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }


    // ----------------------------------------------------------------------
    // UserRepository::setCreatedAt()| Assert | [X] Validé
    // ----------------------------------------------------------------------
    //test de querie
    public function testSearchUser(): void
    {
         //on recupere l'entite
        $user = $this->entityManager
            ->getRepository(User::class) 
            ->findOneByEmail('admin@todolist.com');

        $this->assertSame('timothee93', $user->getUsername());
    }
}
