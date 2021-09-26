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
        if ($task['project_id'] == $project_name) {
            $result++;
        }
    }

    return $result;
}

/**
 * Подсчет разницы (в часах) между двумя датами
 * @param array $array_date Массив дат из задач
 * @param integer $current_date Текущая дата
 * @param string $task_date Дата из задачи
 * @param integer $calc_date Получаем разницу дат $current_date и $task_date
 * @param integer $result Привод к целому числу и перевод в часы
 * @return integer Результат
 */
function show_date($array_date) {

     $current_date = strtotime("now");
     $task_date = strtotime($array_date);
     $calc_date = $current_date - $task_date;

     if ($array_date == null) {
         return false;
     }

     $result = floor($calc_date/3600);

    return $result;
}

/**
 * Возвращает дату в отформатированном строковом представлении "ДД-MM-ГГГГ"
 * @param string $date Дата в формате «ГГГГ-ММ-ДД ЧЧ:ММ:СС»
 * @return string Результат
 */
function format_date($date) {
    $date = date_create($date);

    return date_format($date, 'd-m-Y');
}
