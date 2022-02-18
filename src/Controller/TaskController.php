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


    #[Route("/tasks", name: "task_list")]
    public function listAction(TaskRepository $taskRepo)
    {
        return $this->render('task/list.html.twig', ['tasks' => $taskRepo->findAll()]);
    }

    #[Route("/tasks/create", name: "task_create")]
    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($task);
            $this->em->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->renderForm('task/create.html.twig', ['form'=> $form,]);
    }

    #[Route("/tasks/{id}/edit", name:"task_edit")]
    public function editAction(Task $task, Request $request)
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->renderForm('task/edit.html.twig', ['form'=> $form,'task' => $task]);
    }


    #[Route("/tasks/{id}/toggle", name: "task_toggle")]
    public function toggleTaskAction(Task $task)
    {
        $task->toggle(!$task->isDone());
        $this->em->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }


    #[Route("/tasks/{id}/delete", name: "task_delete")]
    public function deleteTaskAction(Task $task)
    {
        $this->em->remove($task);
        $this->em->flush();

        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('task_list');
    }

    #[Route('/task', name: 'task')]
    public function index1(): Response
    {
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }

    #[Route("/task/isdone", name: "task_isdone", methods: "GET")]
    public function allIsdoneTask(TaskRepository $taskRepo) 
    {
        return $this->render('task/isdoneList.html.twig', ['lists' => $taskRepo->findBy(['isdone'=>'true'])]) ;
    }
}
