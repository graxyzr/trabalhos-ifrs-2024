CREATE DATABASE IF NOT EXISTS `farmacia`;
USE `farmacia`;

CREATE TABLE IF NOT EXISTS `remedios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `laboratorio` VARCHAR(100) NOT NULL,
    `preco` DECIMAL(10,2) NOT NULL,
    `quantidade` INT NOT NULL
);