SELECT * FROM tb_produtos_tags
INNER JOIN tb_tags
ON tb_produtos_tags.id_tag = tb_tags.id WHERE tb_tags.id = 2;

SELECT * FROM tb_produtos_tags INNER JOIN tb_tags ON tb_produtos_tags.id_tag = tb_tags.id WHERE tb_produtos_tags.id_produto = 2;