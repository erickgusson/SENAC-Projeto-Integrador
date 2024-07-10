<?php

$_ENV = parse_ini_file(".env");

class Produto
{

    public function ListarProdutos()
    {

        $conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};", $_ENV['USER'], $_ENV['PASSWORD']);
        $query = "SELECT * FROM tb_produtos ORDER BY RAND()";
        $resultado = $conexao->query($query)->fetchAll();

        return $resultado;
    }

    public function Listar1Produto($id)
    {

        $conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};", $_ENV['USER'], $_ENV['PASSWORD']);
        $query = "SELECT * FROM tb_produtos WHERE id = {$id}";
        $resultado = $conexao->query($query)->fetch();
        
        return $resultado;

    }
}
