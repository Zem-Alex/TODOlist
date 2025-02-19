<?php

namespace ContainerC2KUeIF;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaskControllergetTasksService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.H5Unf_H.App\Controller\TaskController::getTasks()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.H5Unf_H.App\\Controller\\TaskController::getTasks()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'taskRepository' => ['privates', 'App\\Repository\\TaskRepository', 'getTaskRepositoryService', true],
            'serializer' => ['privates', '.errored.s.f.Lsx', NULL, 'Cannot determine controller argument for "App\\Controller\\TaskController::getTasks()": the $serializer argument is type-hinted with the non-existent class or interface: "Symfony\\Component\\Serializer\\SerializerInterface".'],
        ], [
            'taskRepository' => 'App\\Repository\\TaskRepository',
            'serializer' => '?',
        ]))->withContext('App\\Controller\\TaskController::getTasks()', $container);
    }
}
