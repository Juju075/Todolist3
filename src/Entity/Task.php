<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;
use App\Entity\Traits\Timestampable;
use Assert\NotBlank;


#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\HasLifecycleCallbacks()]

class Task
{
    use Timestampable;

    
    #[ORM\Column(type: "integer")]
    #[ORM\Id] 
    #[ORM\GeneratedValue(strategy: "AUTO")] 
    private $id;


    #[ORM\Column(type: "datetime")]
    private $createdAt;


    #[ORM\Column(type: "string")]
    #[NotBlank(message: "Vous devez saisir un titre.")]
    private $title;


    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Vous devez saisir du contenu.")]
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDone;

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


}
