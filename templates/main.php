<?php
/* В сценарии главной страницы выполните подключение к MySQL. */
$con = mysqli_connect("localhost", "root", "","things_are_ok");
mysqli_set_charset($con, "utf8");

/* Отправьте SQL-запрос для получения списка проектов у текущего пользователя. */
$sql_project = "SELECT * FROM project 
                         WHERE user_id = 3";
$result = mysqli_query($con, $sql_project);
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

/* Отправьте SQL-запрос для получения списка из всех задач у текущего пользователя. */
$sql_task = "SELECT * FROM task
                      WHERE user_id = 3";
$result = mysqli_query($con, $sql_task);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($projects as $project): ?>
                <li class="main-navigation__list-item">
                    <a class="main-navigation__list-item-link" href="#"><?= htmlspecialchars($project['p_name']) ?></a>
                    <span class="main-navigation__list-item-count"><?= calc_for_project($tasks, $project['id']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
            <input class="checkbox__input visually-hidden show_completed" type="checkbox"<?php if ($show_complete_tasks == 1): ?> checked<?php endif; ?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach ($tasks as $task):
            if ($task['t_status'] and $show_complete_tasks == 0) {
                continue;
            } ?>
            <tr class="tasks__item task <?php if (show_date($task['due_date']) >= 24): ?> task--important<?php endif; ?><?php if ($task['t_status']): ?> task--completed<?php endif; ?>">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden" type="checkbox"<?php if ($task['t_status']): ?> checked<?php endif; ?>>
                        <span class="checkbox__text"><?= htmlspecialchars($task['t_name']) ?></span>
                    </label>
                </td>
                <td class="task__date"><?= format_date($task['due_date']) ?></td>
                <td class="task__controls"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
