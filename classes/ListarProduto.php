<?php

$_ENV = parse_ini_file(".env");

class Produto
{

    public function ListarProdutos()
    {

        include 'conexao.php';
        $query = "SELECT * FROM tb_produtos ORDER BY RAND()";
        $resultado = $conexao->query($query)->fetchAll();

        return $resultado;
    }

    public function Listar1Produto($id)
    {

        try {
            include 'conexao.php';
            $query = "SELECT * FROM tb_produtos WHERE id = {$id}";
            $resultado = $conexao->query($query)->fetch();

            return $resultado;
        } catch (PDOException $th) {
            return false;
        }
        
    }
}
