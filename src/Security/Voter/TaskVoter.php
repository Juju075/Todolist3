<?php

namespace App\Security\Voter;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * C le système qui gère les permissions d’accès aux différents éléments de l’app.
 * return true ou false
 */
class TaskVoter extends Voter
{
    public const DELETE = 'TASK_DELETE';
    public const EDIT = 'TASK_EDIT';
    public const TOGGLE = 'TASK_TOGGLE';

    private $security;

    // Security -> Permissions utilisateurs. (ROLES)
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
    protected function supports(string $attribute, $task): bool
    {
        return in_array($attribute, [self::DELETE,self::EDIT, self::TOGGLE])
        && $task instanceof \App\Entity\Task;
    }
    
    
    protected function voteOnAttribute(string $attribute, $task, TokenInterface $token): bool
    {
        $user = $token->getUser();

        //On verifie si l'user est Admin
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        //Ci dessous nouvelle contrainte (false)  

        // 1- Verifie si l'user est connecté.
        if (!$user instanceof UserInterface) {
            return false;
        }

        // 2- verifier si la task à un proprietaire
        if (null === $task->getUsers()) {
            return false;
        }

        switch ($attribute) {
            case self::DELETE:
                //On vérifie si on peut supprimer.
                return $this->userCanDelete($task, $user);
                break;            
            case self::EDIT:
                //On vérifie si on peut éditer.
                return $this->userCanEdit($task, $user);

                break;
            case self::TOGGLE:
                //On vérifie si on peut validé.               
                return $this->userCanToggle($task, $user);
                break;
        }
        return false;
    }

    //On separe la logique du switch pour facilier la maintenance du code.
    //Authorisation: Si l'utilisateur est le proprietaire.
    private function userCanDelete(Task $task, User $user)
    {
        return $user === $task->getUser();
    }

    private function userCanEdit(Task $task, User $user)
    {
        return $user === $task->getUser();
    }

    private function userCanToggle(Task $task, User $user)
    {
        return $user === $task->getUser();
    }
}
