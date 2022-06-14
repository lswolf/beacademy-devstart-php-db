CREATE DATABASE db_escola;
USE db_escola
CREATE TABLE tb_professor (
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) NOT NULL,
    email VARCHAR(255) NOT NULL
);
CREATE TABLE tb_aluno(
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    matricula INTEGER NOT NULL
);

INSERT INTO tb_professor (nome,cpf,email) VALUES ('alessandro','12312312312','alesandro@email.com');