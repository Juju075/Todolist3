<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/admin')]
class AdminController extends AbstractController
{

    /**
     * Undocumented function
     *
     * @param EntityManagerInterface $em
     * @param UserPasswordHasherInterface $userPasswordHasher
     */
    public function __construct(
        private EntityManagerInterface $em, 
        private UserPasswordHasherInterface $userPasswordHasher
    ){

    }

    #[Route('/', name: 'app_admin', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/users', name: 'app_admin_users_list',methods: ['GET'])]
    public function listAction(UserRepository $userRepo)
    {
        return $this->render('admin/list.html.twig', ['users' => $userRepo->findAll()]);
    }

    #[Route('/users/create', name:'app_admin_user_create', methods: ['GET', 'POST'])]
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->userPasswordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            if ('$ChoiceType' === true) {
                $user->setRoles(['ROLE_ADMIN']);
            }else{
                $user->setRoles(['ROLE_USER']);
            }
!       
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash('success', 'New User has been added.');
            return $this->redirectToRoute('app_admin_users_list');
        }

        return $this->render('admin/create.html.twig', ['form' => $form->createView()]);
    } 
    
    
    #[Route('/users/{id}/edit', name: 'app_admin_user_edit', methods: ['GET','POST'])]
    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->userPasswordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            //$this->em->flush();
            $this->addFlash('success', 'L\'utilisateur a bien été modifié');
            return $this->redirectToRoute('app_admin_users_list');
        }    
        return $this->render('admin/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }    


    #[Route('/user/{id}/show', name: 'app_admin_user_show')]
   public function showAction(User $user, Request $request)
   {

   }
}
