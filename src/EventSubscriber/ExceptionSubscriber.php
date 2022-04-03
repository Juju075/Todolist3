<?php
declare(strict_types = 1); 
namespace App\EventSubscriber;

use InvalidArgumentException;

//
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

//
use Symfony\Contracts\HttpClient\HttpClientInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

// Listener methods
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Symfony Componet Http...
 * https://symfony.com/doc/current/event_dispatcher.html#creating-an-event-listener
 */
class ExceptionSubscriber implements EventSubscriberInterface
{
    
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function onRedirectionClient(): RedirectResponse
    {
        return new RedirectResponse('homepage');
    }

    /**
     * pour app normal return Response   $response = new JsonResponse();
     *
     * @param ExceptionEvent $event 
     * @return void
     */
    public function onKernelException(ExceptionEvent $event)
    {
            $response = new Response();

            //Recuperer le type d'exepction
            $exception = $event->getThrowable();

            dump('ceci est l\'event subscriber');
            dump($exception);

            switch ($exception) {
                case $exception instanceof NotFoundHttpException:
                    dump('Type: NotFoundHttpException');

                    //status
                    $response->setStatusCode(Response::HTTP_NOT_FOUND);
                    //message
                    $response->setContent('code: 404 message: Resource not found'); 
                    break;
                case $exception instanceof AccessDeniedException: // Voter Redirection avec Flash message
                    dump('Type: AccessDeniedException');
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    $response->setContent('code: 403 message: Forbiden'); 
                    $response = $this->client->request('GET', '/');
                    break;
                case $exception instanceof InvalidArgumentException:
                    dump('Type: InvalidArgumentException');
                    $code = $response->setStatusCode($exception->getCode());
                    //$response->setData($exception->getMessage());
                    $message = null;
                    $response->setContent('code:'.$code.'message:'.$message);
                    break;

                default:
                    dump('Type: NotFoundHttpException');
                    $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    break;

            }

            //sends the modified response object to the event
            //ExceptionEvent $event
            //setResponse()
            $event->setResponse($response);
    }

    //Symfony events
    public static function getSubscribedEvents(): Array 
    {
        return [
            //KernelEvents::EXCEPTION => ['onKernelException', 10],
            KernelEvents::EXCEPTION => ['onRedirectionClient', 10],
        ];    
    }    

}

