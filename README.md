# SENAC-Projeto-Integrador

## Prototipagem [FIGMA](https://www.figma.com/design/S5BcTuiYcDY9nhg4MLYlRg/Prototipagem-P.I---Doces-Lunares?node-id=0-1&t=YAZn5pAdM0LVGLr6-1)

## Script banco de dados

### usuário (login) [MYSQL]

``` 
CREATE DATABASE db_usuarios;
USE db_usuarios;
 
CREATE TABLE tb_usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    senha VARCHAR(100),
    id_pessoa INT NOT NULL
);
 
INSERT INTO tb_usuario(`email`,`senha`,`id_pessoa`) VALUES('renon@gmail.com','renon123',1);
INSERT INTO tb_usuario(`email`,`senha`,`id_pessoa`) VALUES('erick@gmail.com','erick456',2);
```
