<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/tasks' => [
            [['_route' => 'app_task_gettasks', '_controller' => 'App\\Controller\\TaskController::getTasksAction'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_task_createtask', '_controller' => 'App\\Controller\\TaskController::createTaskAction'], null, ['POST' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/tasks/([^/]++)(?'
                    .'|(*:64)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        64 => [
            [['_route' => 'app_task_gettask', '_controller' => 'App\\Controller\\TaskController::getTaskAction'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_task_updatetask', '_controller' => 'App\\Controller\\TaskController::updateTaskAction'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'app_task_deletetask', '_controller' => 'App\\Controller\\TaskController::deleteTaskAction'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
