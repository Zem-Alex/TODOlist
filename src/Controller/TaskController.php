<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


final class TaskController extends AbstractController
{
    // Получение всех задач
    #[Route('/api/tasks', methods: ['GET'])]
    public function getTasks(TaskRepository $taskRepository): JsonResponse
    {
        $tasks = $taskRepository->findAll();

        if (!$tasks) {
            return $this->json(['message' => 'Tasks not found'], 404);
        }

        // Можно добавить сериализацию, если нужно
        return $this->json($tasks);
    }

    // Получение задачи по ID
    #[Route('/api/tasks/{id}', methods: ['GET'])]
    public function getTask(int $id, TaskRepository $taskRepository): JsonResponse
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        return $this->json($task);
    }

    // Создание новой задачи
    #[Route('/api/tasks', methods: ['POST'])]
    public function createTask(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true); // Получаем данные из тела запроса

        $task = new Task();
        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setStatus('new');
        $task->setCreatedAt(new \DateTime());
        $task->setUpdatedAt(new \DateTime());

        $entityManager->persist($task);
        $entityManager->flush();

        return $this->json($task, 201); // Возвращаем созданную задачу с кодом 201
    }

    // Обновление задачи по ID
    #[Route('/api/tasks/{id}', methods: ['PUT'])]
    public function updateTask(int $id, Request $request, TaskRepository $taskRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        $data = json_decode($request->getContent(), true); // Получаем данные из тела запроса

        $task->setTitle($data['title']);
        $task->setDescription($data['description']);
        $task->setStatus($data['status']);
        $task->setUpdatedAt(new \DateTime());

        $entityManager->flush();

        return $this->json($task);
    }

    // Удаление задачи по ID
    #[Route('/api/tasks/{id}', methods: ['DELETE'])]
    public function deleteTask(int $id, TaskRepository $taskRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $task = $taskRepository->find($id);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        $entityManager->remove($task);
        $entityManager->flush();

        return $this->json(['message' => 'Task deleted']);
    }
}