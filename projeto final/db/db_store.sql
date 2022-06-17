CREATE DATABASE db_store;
USE db_store;
CREATE TABLE tb_category(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(1000) NOT NULL
);
CREATE TABLE tb_product( 
     id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    value FLOAT(6,2) NOT NULL,
    category_id INT(11) NOT NULL,
    quantity INT(5) NOT NULL,
    created_at DATETIME NOT NULL
);
INSERT INTO tb_category (name, description) VALUES
('informatica','produtos de informatica e acessorios para computador'),
('escritorio','cadernos, canetas, pilhas, granpos e tudo mais'),
('eletronicos','TVs, Som portatil, Celulares, Tablets, etc'),