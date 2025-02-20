<?php

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class TaskController extends AbstractController
{
    private $taskService;
    private $serializer;

    public function __construct(TaskService $taskService, SerializerInterface $serializer)
    {
        $this->taskService = $taskService;
        $this->serializer = $serializer;
    }

    // Получение всех задач
    #[Route('/api/tasks', methods: ['GET'])]
    public function getTasksAction(): Response
    {
        $tasks = $this->taskService->getTasks();

        if (!$tasks) {
            return $this->json(['message' => 'Tasks not found'], 404);
        }

        return $this->json($tasks);
    }

    // Получение задачи по ID
    #[Route('/api/tasks/{id}', methods: ['GET'])]
    public function getTaskAction(int $id): Response
    {
        $task = $this->taskService->getTaskById($id);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        return $this->json($task);
    }

    // Создание новой задачи
    #[Route('/api/tasks', methods: ['POST'])]
    public function createTaskAction(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $task = $this->taskService->createTask($data);

        return $this->json($task, 201);
    }

    // Обновление задачи по ID
    #[Route('/api/tasks/{id}', methods: ['PUT'])]
    public function updateTaskAction(int $id, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $task = $this->taskService->updateTask($id, $data);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        return $this->json($task);
    }

    // Удаление задачи по ID
    #[Route('/api/tasks/{id}', methods: ['DELETE'])]
    public function deleteTaskAction(int $id): Response
    {
        $task = $this->taskService->deleteTask($id);

        if (!$task) {
            return $this->json(['message' => 'Task not found'], 404);
        }

        return $this->json(['message' => 'Task deleted']);
    }
}
