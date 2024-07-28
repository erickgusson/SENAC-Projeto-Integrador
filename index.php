<?php
include "./includes/header.php";
include "./classes/Classe-Produto.php";

$produto = new Produto();
$maisVendidos = $produto->ListarProdutos(1);
?>
<style>
    .escondido {
        <?= ($_SESSION['nivel'] == "admin") ? 'display: flex !important' : '' ?>
    }
</style>
<div class="banner">
    <img src="assets/img/banner-abertura.png" alt="">
</div>

<section id="home-produtos">
    <section class="produtos">

        <div class="produtos-top">
            <h2>Mais vendidos</h2>

            <a href="produtos.php">Veja mais</a>
        </div>

        <div class="produtos-bottom">
            <?php include "./includes/include-produto-home.php"; ?>
        </div>

    </section>

</section>

<?php include "./includes/footer.php" ?>