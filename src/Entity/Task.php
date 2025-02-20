<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: "tasks")]  // table name in db
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("task:read")]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    #[Groups("task:read")]
    private ?string $title = null;

    #[ORM\Column(type: "text")]
    #[Groups("task:read")]
    private ?string $description = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('new', 'in_progress', 'done')")]
    #[Groups("task:read")]
    private ?string $status = 'new';

    #[ORM\Column(type: "datetime")]
    #[Groups("task:read")]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: "datetime")]
    #[Groups("task:read")]
    private ?\DateTimeInterface $updatedAt = null;
    // 
     public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
} 
