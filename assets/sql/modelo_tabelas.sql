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
    `numero` VARCHAR(255),
    `complemento` VARCHAR(255)
)

CREATE TABLE tb_pessoa_verificacao (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_usuario` INT,
    `login` VARCHAR(200),
    `senha` VARCHAR(200),
    `ativo` ENUM('0', '1')
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
    `vendidos` INT DEFAULT 0
)

CREATE Table tb_produtos_tags (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `data_insercao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_produto` INT,
    `id_tag` INT
)