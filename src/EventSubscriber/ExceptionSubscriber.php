<?php
declare(strict_types = 1); 
namespace App\EventSubscriber;

use InvalidArgumentException;

//
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\HttpClient\HttpClientInterface;

//
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;

// Listener methods
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;


/**
 * Symfony Componet Http...
 * https://symfony.com/doc/current/event_dispatcher.html#creating-an-event-listener
 */
class ExceptionSubscriber extends AbstractController implements EventSubscriberInterface
{
    
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * pour app normal return Response   $response = new JsonResponse();
     *
     * @param ExceptionEvent $event 
     * @return void
     */
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();       
        //$response = new RedirectResponse($this->generateUrl('task_list').'/error='.$exception->getCode());
        $response = new RedirectResponse($this->generateUrl('task_list'));

            switch ($exception) {
                case $exception instanceof NotFoundHttpException: //Ne redirige pas (passe pas par le voter.)
                    $response->setStatusCode(Response::HTTP_NOT_FOUND);

                break;

                case $exception instanceof AccessDeniedException: //ok redirige
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    $response->setContent('code: 403 message: Forbiden'); 
                break;

                case $exception instanceof InvalidArgumentException:
                    $code = $response->setStatusCode($exception->getCode());
                    $message = null;
                    $response->setContent('code:'.$code.'message:'.$message);
                break;
                    
                default:
                    $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                break;

            }
            $event->setResponse($response);
    }

    //Symfony events
    public static function getSubscribedEvents(): Array 
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 10],
        ];    
    }    

}

