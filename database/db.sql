CREATE DATABASE sistema_estoque;
USE sistema_estoque;

CREATE TABLE produto(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY UNIQUE,
    nome VARCHAR(45) NOT NULL,
    categoria VARCHAR(45) NOT NULL,
    descricao VARCHAR(150) NOT NULL,
    preco FLOAT NOT NULL,
    quantidade_estoque INT NOT NULL,
    data_validade DATE NOT NULL
);