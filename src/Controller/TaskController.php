<?php
declare(strict_types = 1); 
namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;

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





    #[Route("/tasks/create", name: "task_create")]
    #[IsGranted('ROLE_USER')]
    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $task->setUser($this->getUser());
            $this->em->persist($task);
            $this->em->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->renderForm('task/create.html.twig', ['form'=> $form,]);
    }


    #[Route("/tasks/{id}/edit", name:"task_edit")]
    #[IsGranted('TASK_EDIT')]
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
    #[IsGranted('ROLE_USER')]
    public function toggleTaskAction(Task $task)
    {
        $task->toggle(!$task->isDone());
        $this->em->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }


    // etre proprietaire pour delete 
    #[Route("/tasks/{id}/delete", name: "task_delete")]
    #[IsGranted('ROLE_USER')]
    //voter event
    public function deleteTaskAction(Task $task)
    {
        //|| $task->getUser === 'ROLE_ADMIN' 
        if($this->getUser() === $task->getUser() ){
            $this->em->remove($task);
            $this->em->flush();
    
            $this->addFlash('success', 'La tâche a bien été supprimée.');
    
            return $this->redirectToRoute('task_list');
        }
            $this->addFlash('success', 'Vous devez etre l\'auteur de la task pour la supprimer.');
    }

    #[Route("/task/isdone", name: "task_isdone", methods: "GET")]
    //#[Entity('task', expr: 'repository.findBySlug(article_slug)')]
    public function allIsdoneTask(TaskRepository $taskRepo) 
    {
        return $this->render('task/isdoneList.html.twig', ['lists' => $taskRepo->findBy(['isdone'=> true])]) ;
    }
}
