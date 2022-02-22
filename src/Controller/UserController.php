<?php
declare(strict_types = 1);
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
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
    ){}

    #[Route('/users', name: 'user_list',methods: ['GET'])]
    public function listAction(UserRepository $userRepo)
    {
        return $this->render('user/list.html.twig', ['users' => $userRepo->findAll()]);
    }

    #[Route('/users/create', name:'user_create', methods: ['GET', 'POST'])]
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //$password = $this->get('security.password_encoder')->encodePassword($user, $user->getPassword());

            $password = $this->userPasswordHasher->hashPassword($user, $user->getPassword());

            $user->setPassword($password);

            $this->em->persist($user);
            $this->em->flush();

            $this->addFlash('success', 'L\'utilisateur a bien été ajouté.');

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }    
    #[Route('/users/{id}/edit', name: 'user_edit', methods: ['GET','POST'])]
    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->userPasswordHasher->hashPassword($user, $user->getPassword());

            $user->setPassword($password);

            $this->em->flush();

            $this->addFlash('success', 'L\'utilisateur a bien été modifié');

            return $this->redirectToRoute('user_list');
        }    

        return $this->render('user/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }    
}
