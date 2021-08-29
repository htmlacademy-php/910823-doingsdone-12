<?php
include_once('helpers.php');
include_once('my_function.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// HTML код главной страницы 
$page_content = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);

// окончательный HTML код 
$layout_content = include_template('layout.php', ['content' => $page_content, 'title_tab' => 'Дела в порядке']);

// вывод на экран итоговой страницы 
print($layout_content);
