<?php

$_ENV = parse_ini_file(".env");

class Produto
{

    public function ListarProdutos()
    {

        $conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};", $_ENV['USER'], $_ENV['PASSWORD']);
        $query = "SELECT * FROM tb_produtos ORDER BY RAND()";
        $produtos = $conexao->query($query)->fetchAll();

        return $produtos;

    }

}
