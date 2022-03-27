<?php
declare(strict_types = 1);
use PHPUnit\Framework\TestCase;
use App\EventSubscriber\ExceptionSubscriber;
use Symfony\Component\HttpKernel\KernelEvents;


/**
 * Uniquement des tests unitaire.
 */
class ExceptionSubscriberTest extends TestCase
{
    /**
     * Verifie si on s'abonne au bon event cad KernelEvents::EXCEPTION 
     */
    public function testEventSubscription()
    {
        $this->assertArrayHasKey(KernelEvents::EXCEPTION , ExceptionSubscriber::getSubscribedEvents());
    }
    
}