<?php
$_ENV = parse_ini_file(".env");

class CadastrarProduto
{

    public function CadastrarProduto($imagem, $nome, $descricao, $ingredientes, $preco)
    {

        include 'conexao.php';
        $scriptProduto = "INSERT INTO tb_produtos (imagem, nome, descricao, ingredientes, preco) VALUES (:imagem, :nome, :descricao, :ingredientes, :preco)";
        $conexao->prepare($scriptProduto)->execute([
            ":imagem" => $imagem,
            ":nome" => $nome,
            ":descricao" => $descricao,
            ":ingredientes" => $ingredientes,
            ":preco" => $preco,
        ]);

        header('location: produto-selecionado.php?id=' . $conexao->lastInsertId());
    }
}
