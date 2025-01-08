CREATE DATABASE IF NOT EXISTS `exercice_user`;

USE `exercice_user`;

CREATE TABLE IF NOT EXISTS useraccount (
user_id INT PRIMARY KEY AUTO_INCREMENT,
user_lastname VARCHAR(100) NOT NULL,
user_firstname VARCHAR(100) NOT NULL,
user_email VARCHAR(100) UNIQUE NOT NULL,
user_password VARCHAR(100) NOT NULL
);

