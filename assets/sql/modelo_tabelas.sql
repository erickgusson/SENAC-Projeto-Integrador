-- Active: 1719583187159@@62.72.62.1@3306@u687609827_erick
-- SQLBook: Code
CREATE TABLE tb_pessoa (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `nome` VARCHAR(255),
    `email` VARCHAR(255),
    `telefone` VARCHAR(255),
    `CEP` VARCHAR(255),
    `cidade` VARCHAR(255),
    `bairro` VARCHAR(255),
    `rua` VARCHAR(255),
    `numero` VARCHAR(255)
)

CREATE TABLE tb_user (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_usuario` INT,
    `foto_perfil` VARCHAR(200) DEFAULT 'perfil.png',
    `login` VARCHAR(200),
    `senha` VARCHAR(200),
    `status` ENUM('0', '1') DEFAULT '1',
    `nivel` VARCHAR(5) DEFAULT 'user'
)

CREATE TABLE tb_tags (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `tag` VARCHAR(200)
)

CREATE TABLE tb_produtos (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `imagem` VARCHAR(200),
    `nome` VARCHAR(200),
    `descricao` TEXT,
    `ingredientes` TEXT,
    `preco` FLOAT(9, 2),
    `estoque` INT DEFAULT 0,
    `vendidos` INT DEFAULT 0,
    `status` ENUM('0', '1') DEFAULT '1'
)

CREATE TABLE tb_produtos_tags (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_produto` INT,
    `id_tag` INT
)

CREATE TABLE tb_vendas (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_usuario` INT,
    `id_produto` INT,
    `preco` FLOAT(5, 2),
    `vendidos` INT,
    `total` FLOAT(5, 2)
);

CREATE TABLE tb_voucher (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `nome` VARCHAR(20) UNIQUE,
    `desconto` FLOAT(5, 2),
    `status` ENUM('0', '1') DEFAULT '1'
);