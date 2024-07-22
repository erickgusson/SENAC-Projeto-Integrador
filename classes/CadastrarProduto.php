<?php 
$_ENV = parse_ini_file(".env");

class CadastrarProduto{

    public function CadastrarProduto($nome, $preco, $descricao, $ingredientes, $imagem){

        include 'conexao.php';
        $scriptProduto = "INSERT INTO tb_produtos (nome, descricao, ingredientes, preco, estoque) VALUES ('$nome', '$preco', '$descricao', '$ingredientes', '$imagem')";
        $resultado = $conexao->query($scriptProduto)->fetch();

        $resultado->execute([
            
        ]);

        
    }

}