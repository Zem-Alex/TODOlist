<?php

namespace ContainerXaq71yL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaskControllergetTaskService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.HTuWMbh.App\Controller\TaskController::getTask()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.HTuWMbh.App\\Controller\\TaskController::getTask()'] = ($container->privates['.service_locator.HTuWMbh'] ?? $container->load('get_ServiceLocator_HTuWMbhService'))->withContext('App\\Controller\\TaskController::getTask()', $container);
    }
}
