<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Task;

use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * Construct
     *
     * @param EntityManagerInterface $em
     * @param UserPasswordHasherInterface $userPasswordHasher
     */
    public function __construct(private EntityManagerInterface $em 
    ){}

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    #[Route("/tasks", name: "task_list")]
    public function listAction(TaskRepository $taskRepo)
    {
        return $this->render('task/list.html.twig', ['tasks' => $taskRepo->findAll()]);
    }
 
    #[Route("/task/isdone", name: "task_list_terminated")]
    public function listTerminatedAction(TaskRepository $taskRepo)
    {
        return $this->render('task/isdonelist.html.twig', ['tasks' => $taskRepo->findby([])]); //critere toogle a true
    }
    
    // #[Security("is_granted('ROLE_USER', task)", statusCode: 404, message: 'Resource not found.')]
    #[Route("/tasks/create", name: "task_create")]
    //#[IsGranted('TASK_CREATE', subject: 'task')]
    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $task->setUser($this->getUser());
            $this->em->persist($task);
            $this->em->flush();

            $this->addFlash('success', 'New Task it done.');

            return $this->redirectToRoute('task_list');
        }

        return $this->renderForm('task/create.html.twig', ['form'=> $form,]);
    }

    #[Route("/tasks/{id}/edit", name:"task_edit")]
    #[IsGranted('TASK_EDIT', subject: 'task')]
    public function editAction(Task $task, Request $request)
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Task has been updated.');

            return $this->redirectToRoute('task_list');
        }

        return $this->renderForm('task/edit.html.twig', ['form'=> $form,'task' => $task]);
    }


    //#[IsGranted('ROLE_USER', subject: 'task', statusCode: 403)]
    #[Route("/tasks/{id}/toggle", name: "task_toggle")]
    #[IsGranted('TASK_TOGGLE', subject: 'task', statusCode: 403)]
    public function toggleTaskAction(Task $task)
    {
        $task->toggle(!$task->isDone());
        $this->em->flush();

        $this->addFlash('success', sprintf('Task %s has been toogle.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }

    //#[IsGranted('TASK_DELETE', subject: 'task')]
    #[Route("/tasks/{id}/delete", name: "task_delete")]
    public function deleteTaskAction(Task $task)
    {
            $this->em->remove($task);
            $this->em->flush();
            $this->addFlash('success', 'Task has been deleted.');
            return $this->redirectToRoute('task_list');
    }

    #[Route("/task/isdone", name: "task_isdone", methods: "GET")]
    #[IsGranted('TASK_TOGGLE' , subject: 'task')]
    //#[Entity('task', expr: 'repository.findBySlug(article_slug)')]
    public function allIsdoneTask(TaskRepository $taskRepo) 
    {
        return $this->render('task/isdoneList.html.twig', ['lists' => $taskRepo->findBy(['isdone'=> true])]) ;
    }
}
