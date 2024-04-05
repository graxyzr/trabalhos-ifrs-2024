CREATE DATABASE crud_filmes;

USE crud_filmes;

CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    diretor VARCHAR(100) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    imagem LONGBLOB NOT NULL
);
