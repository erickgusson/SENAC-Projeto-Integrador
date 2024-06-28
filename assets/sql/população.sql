INSERT INTO `tb_users`(`nome`, `email`, `telefone`, `CEP`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) 
VALUES('nome', 'email', 'telefone', 'cep', 'cidade', 'bairro', 'rua', 'numero', 'complemento');

INSERT INTO `tb_user_verificacao`(`id_usuario`, `login`, `senha`, `ativo`) 
VALUES(0, 'email', 'senha', 1)

INSERT INTO `tb_tags`(`tag`) 
VALUES('nome da tag');

INSERT INTO `tb_produtos`(`imagem`, `nome`, `preco`) 
VALUES('imagem', 'nome do produto (100g)', 'preco');

INSERT INTO `tb_produtos_tags`(`id_produto`, `id_tag`) 
VALUES(0, 0);
