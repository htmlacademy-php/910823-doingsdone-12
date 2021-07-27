CREATE DATABASE things_are_ok
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE things_are_ok;

/* Пользователи */
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    u_name VARCHAR(350),
    email VARCHAR(350) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL UNIQUE,
    date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/* Проекты */
CREATE TABLE project (
    id INT AUTO_INCREMENT PRIMARY KEY,
    p_name VARCHAR(350),
    user_id INT
);

/* Задачи к проектам */
CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    t_name VARCHAR(350),
    date_of_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status TINYINT DEFAULT 0,
    file VARCHAR(15000),
    due_date TIMESTAMP,
    user_id INT UNIQUE,
    project_id INT UNIQUE
);
