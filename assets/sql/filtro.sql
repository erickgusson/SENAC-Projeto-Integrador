

SELECT * FROM tb_produtos_tags INNER JOIN tb_tags ON tb_produtos_tags.id_tag = tb_tags.id WHERE tb_tags.tag = 'Docinhos' OR tb_tags.tag = 'cones';

SELECT * FROM tb_produtos_tags INNER JOIN tb_tags ON tb_produtos_tags.id_tag = tb_tags.id WHERE tb_produtos_tags.id_produto = 2;