<?php
include "./includes/header.php";
include "./classes/Produto.php";

$produto = new Produto();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $dados = $produto->Listar1Produto($id);

} else {
    header('location: produtos.php');
}

?>

<section id="produto-selecionado">

    <h1><?= $dados['nome'] ?></h1>

    <figure>

        <div class="produto-img-tag">
            <img class="caixa-produto" src="assets/img/produtos/<?= $dados['imagem'] ?>.png" alt="<?= $dados['nome'] ?>">

            <div class="tags">
                <span>Torta</span>
                <span>Fruta</span>
                <span>Morango</span>
                <span>Massas</span>
            </div>

        </div>

        <span>Essa torta consiste em um massa de biscoito de maizena, recheio de creme branco com pedaços de
            morango, cobertura de calda de morango e morangos inteiros.
        </span>

    </figure>

    <div class="preco-adicionar">
        <p class="preco">Preço: R$ <?= $dados['preco'] ?></p>
        <div class="adicionar">
            <button class="botao-click">EU QUEROOO!</button>
        </div>
    </div>

</section>
<?php include "./includes/footer.php" ?>