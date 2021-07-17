<?php
include_once('helpers.php');
include_once('my_function.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// массив проектов и задач
$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '16.07.2022',
        'category' => 'Работа',
        'result' => false,
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'category' => 'Работа',
        'result' => false,
    ],
    [
        'name' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => 'Учеба',
        'result' => true,
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '16.07.2021',
        'category' => 'Входящие',
        'result' => false,
    ],
    [
        'name' => 'Купить корм для кота',
        'date' => null,
        'category' => 'Домашние дела',
        'result' => false,
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => null,
        'category' => 'Домашние дела',
        'result' => false,
    ],
];

// HTML код главной страницы 
$page_content = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);

// окончательный HTML код 
$layout_content = include_template('layout.php', ['content' => $page_content, 'title_tab' => 'Дела в порядке']);

// вывод на экран итоговой страницы 
print($layout_content);
