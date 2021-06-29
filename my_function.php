<?php

/**
 * Подсчет задач для проектов
 * @param array $array_tasks Массив задач
 * @param string $project_name Название проекта
 * @return integer Количество задач проекта
 */
function calc_for_project($array_tasks, $project_name) {
    $result = 0;

    foreach ($array_tasks as $task) {
        if ($task['category'] == $project_name) {
            $result++;
        }
    }

    return $result;
}

