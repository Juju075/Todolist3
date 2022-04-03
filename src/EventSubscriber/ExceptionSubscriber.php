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
        //redirectToRoute is the shortcut to error page:
            $response = new RedirectResponse($this->generateUrl('homepage'));

            $exception = $event->getThrowable();

            switch ($exception) {
                case $exception instanceof NotFoundHttpException:
                    dump('Case_Type:01 NotFoundHttpException');
                    //status
                    $response->setStatusCode(Response::HTTP_NOT_FOUND);
                    //message
                    $response->setContent('code: 404 message: Resource not found'); 
                    //url de redirection error404.html.twig
                break;

                case $exception instanceof AccessDeniedException: 
                    dump('Case_Type:02 AccessDeniedException');
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    $response->setContent('code: 403 message: Forbiden'); 
                    //url de redirection error403.html.twig
                break;

                case $exception instanceof InvalidArgumentException:
                    dump('Case_Type:03 InvalidArgumentException');
                    $code = $response->setStatusCode($exception->getCode());
                    //$response->setData($exception->getMessage());
                    $message = null;
                    $response->setContent('code:'.$code.'message:'.$message);
                    //url de redirection errorInvalidArgument.html.twig
                    break;
                    
                    default:
                    dump('Case_Type:Default Internal error 500');
                    $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
                    //url de redirection error500.html.twig
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

