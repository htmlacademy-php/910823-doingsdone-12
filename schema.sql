/* DROP DATABASE IF EXISTS things_are_ok; */
CREATE DATABASE things_are_ok
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE things_are_ok;

/* Пользователи */
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    u_name VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL
);

/* Проекты */
CREATE TABLE project (
    id INT AUTO_INCREMENT PRIMARY KEY,
    p_name VARCHAR (256),
    user_id INT,
    INDEX (user_id)
);

/* Задачи к проектам */
CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_of_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    t_name VARCHAR (256),
    t_status TINYINT DEFAULT 0,
    file_name VARCHAR (256),
    due_date TIMESTAMP,
    user_id INT,
    project_id INT,
    INDEX (user_id),
    INDEX (project_id)
);
