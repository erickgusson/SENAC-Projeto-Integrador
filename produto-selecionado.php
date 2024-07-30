<?php
include "./includes/header.php";
include "./classes/Classe-Produto.php";

$produto = new Produto();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $dados = $produto->Listar1Produto($id, 1);
    $tags = $produto->ListarTags1Produto($id);
    if ($dados == false) {
        header('location: produtos.php?erro=1');
    }
} else {
    header('location: produtos.php?erro=1');
    echo "<script>history.go(-1);</script>";
    echo "<script>window.location.href = 'produtos.php?erro=1';</script>";
}

if (isset($_SESSION['nivel']) != 'admin') {
    if ($dados['status'] == 0) {
        header('location: produtos.php?erro=1');
    }
}

?>

<section id="produto-selecionado">

    <div style="display: flex; align-items: center; gap: 50px; ">
        <h1><?= $dados['nome'] ?></h1>
        <?php
        if (isset($_SESSION['usuario'])) {
            if ($_SESSION['nivel'] !== "user") {
                echo '<a href="produto-editar.php?id=' . $dados['id'] . '"> <img src="./assets/img/icon/icon-edit.svg" alt="" width="40px"></a>';
            }
        } ?>
    </div>
    <figure>

        <div class="produto-img-tag">
            <img class="caixa-produto" src="assets/img/produtos/<?= $dados['imagem'] ?>" alt="Foto de <?= $dados['nome'] ?>">

            <div class="tags">
                <?php foreach ($tags as $item) { ?>

                    <a href="produtos.php" style="text-decoration: none;"><span class="<?= $item['tag']  ?>"><?= $item['tag'] ?></span></a>

                <?php } ?>
            </div>

        </div>

        <div>
            <span> <?= $dados['descricao'] ?> </span> <br>
            <small> <?= $dados['ingredientes'] ?> </small>
        </div>

    </figure>

    <div class="preco-adicionar">
        <p class="preco">Preço: R$ <?= number_format($dados['preco'], 2, ',', '.') ?></p>
        <div class="adicionar">
            <button class="botao-click"><a href="produtos.php?produto-adicionar=<?= $dados['id'] ?>" class="botao-click">EU QUEROOO!</a></button>
        </div>
    </div>

</section>
<?php include "./includes/footer.php" ?>