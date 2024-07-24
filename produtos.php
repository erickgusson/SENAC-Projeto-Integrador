<?php
$title = "Produtos";
include "./includes/header.php";
include "./classes/ListarProduto.php";

$produto = new Produto();
$dados = $produto->ListarProdutos(1);

if (isset($_GET['busca']) && !empty($_GET['busca'])) {
    $busca = $_GET['busca'];
    $dados = $produto->Pesquisar($busca);
    // var_dump($dados);
}

// Adiciona produtos ao carrinho
if (isset($_GET['produto-adicionar']) && !empty($_GET['produto-adicionar'])) {
    $id_produto = $_GET['produto-adicionar'];
    $_SESSION['carrinho'][$id_produto]++;
    header('location: produtos.php');
}

?>


<section>
    <main id="produtos" class="col">

        <div class="produtos-esquerda caixa">
            <div>
                <h2>Filtro</h2>
            </div>
            <ul>
                <li>TODOS<input type="checkbox" name="" id="cb-todos"></li>
                <li>Diet<input type="checkbox" name="" id="cb-diet"></li>
                <li>Mousse<input type="checkbox" name="" id="cb-mousse"></li>
                <li>Bolos<input type="checkbox" name="" id="cb-bolos"></li>
                <li>Tortas<input type="checkbox" name="" id="cb-tortas"></li>
                <li>Massas<input type="checkbox" name="" id="cb-"></li>
                <li>Cones<input type="checkbox" name="" id="cb-"></li>
                <li>Frutas<input type="checkbox" name="" id="cb-"></li>
                <li>Sorvetes<input type="checkbox" name="" id="cb-"></li>
                <li>Cookies<input type="checkbox" name="" id="cb-"></li>
                <li>Docinhos<input type="checkbox" name="" id="cb-"></li>
                <li>Especiais<input type="checkbox" name="" id="cb-"></li>
            </ul>
            <button type="button">Filtrar</button>
            <!-- <div class="botao-filtrar">
                </div> -->
        </div>

        <div class="produtos-meio">
            <form method="GET" action="produtos.php" class="titulo-produtos">
                <h2>TODOS</h2>
                <span class="botao-geral"><button style="background: none; cursor:pointer;"><img src="assets/img/icon/icon-pesquisar.png" alt=""></button><input type="search" name="busca"></span>
            </form>

            <div class="lista-produtos">
                <?php include "./includes/produto.php"; ?>
            </div>
        </div>

        <div class="produtos-direita caixa">

            <div>
                <h2>Carrinho</h2>
            </div>

            <div class="carrinho">
                <?php if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $id_produto => $quantidade) {
                        $dados = $produto->Listar1Produto($id_produto);
                        if (isset($dados) && !empty($dados)) { ?>
                            <div class="carrinho-item">
                                <img class="caixa-produto" src="assets/img/produtos/<?= $dados['imagem'] ?>" alt="Foto de <?= $dados['nome'] ?>">
                                <h2><?= $quantidade; ?> x</h2> <!-- quantidade -->
                            </div>
                <?php }
                    }
                } ?>
            </div>

            <a href="carrinho.php"><button class="adicionar">Ir para o carrinho</button></a>
        </div>
    </main>
</section>

<script src="./assets/js/fixarRolagem.js"> </script>

<?php include "./includes/footer.php" ?>