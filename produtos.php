<?php
$title = "Produtos";
include "./includes/header.php";
include "./classes/Classe-Produto.php";

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
    header('location: produtos.php');
    $_SESSION['carrinho'][$id_produto];
    $_SESSION['carrinho'][$id_produto]++;
}

?>

<style>
    .escondido {
        <?= ($_SESSION['nivel'] == "admin") ? 'display: flex !important' : '' ?>
    }
</style>


<section>
    <main id="produtos" class="col">

        <div class="produtos-esquerda caixa">
            <div>
                <h2>Filtro</h2>
            </div>
            <ul>
                <li><label for="Todos">TODOS</label><input type="checkbox" name="todos" id="Todos"></li>
                <li><label for="Torta">Torta</label><input type="checkbox" name="tag[]" value="Torta" id="Torta"></li>
                <li><label for="Bolo">Bolo</label><input type="checkbox" name="tag[]" value="Bolo" id="Bolo"></li>
                <li><label for="Cookie">Cookie</label><input type="checkbox" name="tag[]" value="Cookie" id="Cookie"></li>
                <li><label for="Diet">Diet</label><input type="checkbox" name="tag[]" value="Diet" id="Diet"></li>
                <li><label for="Mousse">Mousse</label><input type="checkbox" name="tag[]" value="Mousse" id="Mousse"></li>
                <li><label for="Massas">Massas</label><input type="checkbox" name="tag[]" value="Massas" id="Massas"></li>
                <li><label for="Cones">Cones</label><input type="checkbox" name="tag[]" value="Cones" id="Cones"></li>
                <li><label for="Frutas">Frutas</label><input type="checkbox" name="tag[]" value="Frutas" id="Frutas"></li>
                <li><label for="Sorvetes">Sorvetes</label><input type="checkbox" name="tag[]" value="Sorvetes" id="Sorvetes"></li>
                <li><label for="Docinhos">Docinhos</label><input type="checkbox" name="tag[]" value="Docinhos" id="Docinhos"></li>
                <li><label for="Especiais">Especiais</label><input type="checkbox" name="tag[]" value="Especiais" id="Especiais"></li>
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
                <?php include "./includes/include-produto.php"; ?>
            </div>
        </div>

        <div class="produtos-direita caixa">

            <div>
                <h2>Carrinho</h2>
            </div>

            <div class="carrinho">

                <?php if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $id_produto => $quantidade) {
                        $dados = $produto->Listar1Produto($id_produto, 1);
                        if (isset($dados) && !empty($dados)) {
                            if ($dados['status'] == 0) {
                                unset($_SESSION['carrinho'][$dados['id']]);
                            }
                ?>
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