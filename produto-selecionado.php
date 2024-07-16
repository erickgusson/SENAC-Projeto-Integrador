<?php


include "./includes/header.php";
include "./classes/ListarProduto.php";

$produto = new Produto();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $dados = $produto->Listar1Produto($id);
    if ($dados == false) {
        header('location: produtos.php?erro=1');
    }
} else {
    header('location: produtos.php');
}
?>

<section id="produto-selecionado">

    <h1><?= $dados['nome'] ?></h1>

    <figure>

        <div class="produto-img-tag">
            <img class="caixa-produto" src="assets/img/produtos/<?= $dados['imagem'] ?>.png" alt="Foto de <?= $dados['nome'] ?>">

            <div class="tags">
                <span>Torta</span>
                <span>Fruta</span>
                <span>Morango</span>
                <span>Massas</span>
            </div>

        </div>

        <div>
            <span> <?= $dados['descricao'] ?> </span> <br>
            <small> <?= $dados['ingredientes'] ?> </small>
        </div>

    </figure>

    <div class="preco-adicionar">
        <p class="preco">Preço: R$ <?= number_format($dados['preco'], 2, '.', ',') ?></p>
        <div class="adicionar">
            <button class="botao-click">EU QUEROOO!</button>
        </div>
    </div>

</section>
<?php include "./includes/footer.php" ?>