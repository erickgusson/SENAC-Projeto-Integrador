<?php
$_ENV = parse_ini_file(".env");

class Produto
{
    public function ListarProdutos($opcao)
    {

        if ($opcao == 1) {
            $operacao = "ORDER BY vendidos DESC";
        }
        if ($opcao == 2) {
            $operacao = "OR ativo = '0' ORDER BY vendidos DESC";
        }

        include 'conexao.php';
        $query = "SELECT * FROM tb_produtos WHERE status = '1' {$operacao}";
        $resultado = $conexao->query($query)->fetchAll();
        
        $conexao = null;
        return $resultado;
    }

    public function Listar1Produto($id, $opcao)
    {

        try {
            if ($opcao == 1) {
                $operacao = "and status = '1'";
            }
            if ($opcao == 2) {
                $operacao = "";
            }

            include 'conexao.php';
            $query = "SELECT * FROM tb_produtos WHERE id = {$id} {$operacao}";
            $resultado = $conexao->query($query)->fetch();
            
            $conexao = null;
            return $resultado;
        } catch (PDOException $th) {
            $conexao = null;
            return false;
        }
    }

    public function Pesquisar($texto)
    {
        try {
            include 'conexao.php';
            $query = "SELECT * FROM tb_produtos WHERE nome LIKE '%{$texto}%' OR ingredientes LIKE '%{$texto}%' OR descricao LIKE '%{$texto}%'";
            $resultado = $conexao->query($query)->fetchAll();

            $conexao = null;
            return $resultado;
        } catch (PDOException $th) {
            $conexao = null;
            return false;
        }
    }

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
        $conexao = null;
    }

    public function EditarProduto($imagem, $nome, $descricao, $ingredientes, $preco, $id)
    {
        include 'conexao.php';

        if(!empty($imagem )){
            $imagem = round(microtime(true)). $imagem;
            $scriptProduto = "UPDATE tb_produtos SET imagem = '$imagem', nome = '$nome', descricao = '$descricao', ingredientes = '$ingredientes', preco = '$preco' WHERE id = '$id'";

        } else{
            $scriptProduto = "UPDATE tb_produtos SET  nome = '$nome', descricao = '$descricao', ingredientes = '$ingredientes', preco = '$preco' WHERE id = '$id'";
        }
        $conexao->prepare($scriptProduto)->execute([]);

        $conexao = null;
        header('location: produto-selecionado.php?id=' . $id);
    }

    public function StatusProduto($id, $status)
    {
        include 'conexao.php';
           
        // ativar produto
        if ($status == 0 ){
            $scriptProduto = "UPDATE tb_produtos SET status = '1' WHERE id = '$id'";
            header('location: editar-produto?id=' .$id);
        } 
        //desativar
        else {
            $scriptProduto = "UPDATE tb_produtos SET status = '0' WHERE id = '$id'";
            header('location: editar-produto?id=' .$id);
        }
        
        $conexao->prepare($scriptProduto)->execute([]);
        $conexao = null;
    }   
}
