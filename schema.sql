CREATE DATABASE things_are_ok
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE things_are_ok;

/* Пользователи */
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    name CHAR(128),
    email CHAR(128) NOT NULL UNIQUE,
    password CHAR(64) NOT NULL UNIQUE,
    date_registration TIMESTAMP
);

/* Проекты */
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    name CHAR(128),
    user_id INT UNIQUE
);

/* Задачи к проектам */
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
    name CHAR,
    date_of_creation TIMESTAMP,
    status TINYINT(1) DEFAULT 0, /* По умолчанию должно быть 0 (какой тип?) */
    /*file,*/ /* Какой тип? */
    due_date TIMESTAMP,
    user_id INT UNIQUE,
    project_id INT UNIQUE
);
