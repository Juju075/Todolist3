<?php
declare(strict_types = 1); 
namespace App\EventSubscriber;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpClient\Exception\RedirectionException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class ExceptionSubscriber implements EventSubscriberInterface
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
    public function onKernelException(ExceptionEvent $event) {
            $response = new Response();
            $exception = $event->getThrowable();

            switch ($exception) {
                case $exception instanceof NotFoundHttpException:
                    $response->setStatusCode(Response::HTTP_NOT_FOUND);
                    $response->setContent('code: 404 message: Resource not found'); 
                    break;
                case $exception instanceof AccessDeniedException: // Voter Redirection avec Flash message
                    // $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    // $response->setContent('code: 403 message: Forbiden'); 
                    $response = $this->client->request('GET', '/');
                    break;
                case $exception instanceof InvalidArgumentException:
                    $code = $response->setStatusCode($exception->getCode());
                    //$response->setData($exception->getMessage());
                    $message = null;
                    $response->setContent('code:'.$code.'message:'.$message);
                    break;

                default:
                    $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    $response->setContent('code: 500 message: Internal Server Error'); 
                break;
            }

            $event->setResponse($response);
    }

    //Symfony events
    public static function getSubscribedEvents() 
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 10],
        ];    
    }    
}

