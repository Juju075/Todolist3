<?php
declare(strict_types = 1); 
namespace App\Entity;
use App\Repository\TaskRepository;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Traits\Timestampable;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\HasLifecycleCallbacks()]

class Task
{
    use Timestampable;

    
    #[ORM\Id] 
    #[ORM\GeneratedValue(strategy: 'AUTO')] 
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    //#[Assert\length(min: 3, minMessage: 'Saissisez plus de caracteres.')]
    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(message: 'Vous devez saisir un titre.')]
    //minimum de 3 caracteres.
    private $title;


    //#[Assert\length(min: 3, minMessage: 'Saissisez plus de caracteres.')]
    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'Vous devez saisir un titre.')]
    private $content;

    #[ORM\Column(type: 'boolean')]
    private $isDone;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'task')]
    #[ORM\JoinColumn(nullable: true)]
    private $user;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->isDone = false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function isDone()
    {
        return $this->isDone;
    }

    public function toggle($flag)
    {
        $this->isDone = $flag;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
