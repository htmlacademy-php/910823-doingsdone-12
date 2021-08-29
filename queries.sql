/* Добавление пользователей */
INSERT INTO user (u_name, email, password) VALUES ('Василий', 'vasya@mail.ru', 'secret'),
                                                  ('Дмитрий', 'dima717@mail.ru', 'pw2xWwe'),
                                                  ('Алина', 'alina2020@mail.ru', 'aLina20ok');

/* Добавление проектов */
INSERT INTO project (user_id, p_name) VALUES (1, 'Входящие'),
                                             (2, 'Учеба'),
                                             (1, 'Работа'),
                                             (2, 'Домашние дела'),
                                             (1, 'Авто'),
                                             (3, 'Дача'),
                                             (3, 'Отдых');

/* Заполнение полей таблицы "Задачи" */
INSERT INTO task (t_name, due_date, user_id, project_id) VALUES ('Собеседование в IT компании', '2012-07-16', 1, 3),
                                                                ('Выполнить тестовое задание', '2023-06-12', 2, 3),
                                                                ('Сделать задание первого раздела', '2022-01-14', 1, 2),
                                                                ('Встреча с другом', '2020-03-11', 2, 1),
                                                                ('Купить корм для кота', null, 1, 4),
                                                                ('Заказать пиццу', null, 2, 4),
                                                                ('Выкопать картошку', '2021-09-01', 3, 6),
                                                                ('Завести корову', '2021-08-14', 3, 6),
                                                                ('Поездка на море', '2021-12-21', 3, 7);

/* Обновить название задачи по её идентификатору. */
UPDATE task SET t_name = 'Сделать задание второго раздела' WHERE id = 3;

/* Пометить задачу как выполненную; */
UPDATE task SET t_status = 1 WHERE id = 3;

/* Объединение полей */
SELECT * FROM task
                  JOIN project ON task.project_id = project.id
                  JOIN user ON task.user_id = user.id;

/* Получить список из всех проектов для одного пользователя; */
SELECT project.id, project.p_name FROM task
                                           JOIN project ON project.id = task.project_id
WHERE task.user_id = 1;

/* Получить список из всех задач для одного проекта; */
SELECT * FROM task
WHERE project_id = 4;
