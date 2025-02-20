<?php

namespace App\Service;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

class TaskService
{
    private $taskRepository;
    private $entityManager;

    public function __construct(TaskRepository $taskRepository, EntityManagerInterface $entityManager)
    {
        $this->taskRepository = $taskRepository;
        $this->entityManager = $entityManager;
    }

    public function getTasks()
    {
        return $this->taskRepository->findAll();
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->find($id);
    }

    public function createTask($data)
    {
        $task = new Task();
        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setStatus('new');
        $task->setCreatedAt(new \DateTime());
        $task->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }

    public function updateTask($id, $data)
    {
        $task = $this->taskRepository->find($id);

        if ($task) {
            $task->setTitle($data['title']);
            $task->setDescription($data['description']);
            $task->setStatus($data['status']);
            $task->setUpdatedAt(new \DateTime());
            $this->entityManager->flush();
        }

        return $task;
    }

    public function deleteTask($id)
    {
        $task = $this->taskRepository->find($id);

        if ($task) {
            $this->entityManager->remove($task);
            $this->entityManager->flush();
        }

        return $task;
    }
}
