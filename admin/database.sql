CREATE DATABASE recanto_doce;

USE recanto_doce;

CREATE TABLE categorias(
  ID INT NOT NULL AUTO_INCREMENT,
 nome VARCHAR (25) NOT NULL,
 descricao VARCHAR (2000),
 img VARCHAR (500),
  PRIMARY KEY (ID)
);

CREATE TABLE subcategorias(
  ID INT NOT NULL AUTO_INCREMENT,
 nome VARCHAR (25) NOT NULL,
 descricao VARCHAR (2000),
 img VARCHAR (500),
 categoria INT,
  PRIMARY KEY (ID)
);

CREATE TABLE itens(
    ID INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (25) NOT NULL,
    descricao VARCHAR (2000) NOT NULL,
    preco VARCHAR (10),
    categoria INT,
    img VARCHAR (500),
    PRIMARY KEY (ID)
);

CREATE TABLE eventos(
    ID INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (25) NOT NULL,
    descricao VARCHAR (2000) NOT NULL,
    data DATE,
    img VARCHAR (500),
    PRIMARY KEY (ID)
);

CREATE TABLE promocoes(
    ID INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (25) NOT NULL,
    descricao VARCHAR (2000) NOT NULL,
    datainicial DATE,
    datafinal DATE,
    img VARCHAR (500),
    active boolean,
    PRIMARY KEY (ID)
);

-- CREATE TABLE linkpromo(
--   ID_promo INT,
--   ID_iten INT
-- );

CREATE TABLE usuario (
  ID INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NULL,
  login VARCHAR(100) NOT NULL,
  senha VARCHAR(500) NOT NULL,
  salt VARCHAR(500) NOT NULL,
  ativo boolean,
  PRIMARY KEY(ID),
  UNIQUE (login)
);

INSERT INTO usuario (nome, login, senha, salt, ativo) VALUES ('admin', 'admin', 'b707fa2829852d658b36347f4efe1540a5aaf2f754525ad1cb3a8eea900f1c39', '2lFU4AOm2wocxY0CqCrw1n', '1')