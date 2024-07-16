<?php

$_ENV = parse_ini_file(".env");

class Produto
{

    public function ListarProdutos($opcao)
    {

        if ($opcao == 1) {
            $operacao = "vendidos DESC";
        }
        if ($opcao == 2) {
            $operacao = "RAND()";
        }

        include 'conexao.php';
        $query = "SELECT * FROM tb_produtos ORDER BY {$operacao}";
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

    public function Pesquisar($texto)
    {
        try {
            include 'conexao.php';
            $query = "SELECT * FROM tb_produtos WHERE nome LIKE = '%{$texto}%'";
            $resultado = $conexao->query($query)->fetch();

            return $resultado;
        } catch (PDOException $th) {
            return false;
        }
    }
}
