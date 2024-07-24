<?php
$title = "Carrinho";
include "./includes/header.php";
include "./classes/ListarProduto.php";

$produto = new Produto();

if (isset($_GET['subtrair']) && !empty($_GET['subtrair'])) {
    $id_produto = $_GET['subtrair'];
    $_SESSION['carrinho'][$id_produto]--;
    if ($_SESSION['carrinho'][$id_produto] <= 0) {
        unset($_SESSION['carrinho'][$id_produto]);
    }
    header('location: carrinho.php');
}

if (isset($_GET['adicionar']) && !empty($_GET['adicionar'])) {
    $id_produto = $_GET['adicionar'];
    $_SESSION['carrinho'][$id_produto]++;
    header('location: carrinho.php');
}

if (isset($_GET['deletar']) && !empty($_GET['deletar'])) {
    $id_produto = $_GET['deletar'];
    unset($_SESSION['carrinho'][$id_produto]);
    header('location: carrinho.php');
}

if (isset($_GET['deletar-todos']) && !empty($_GET['deletar-todos'])) {
    $id_produto = $_GET['deletar-todos'];
    array_splice($_SESSION['carrinho'], $id_produto);
}
?>

<section id="carrinho" class="carrinho">
    <h1>Carrinho</h1>
    <table class="caixa">
        <thead>
            <tr>
                <th>Item</th>
                <th>Preço</th>
                <th>QTD</th>
                <th>Subtotal</th>
                <th><a href="carrinho.php?deletar-todos=1">Deletar todos</a></th>
            </tr>
        </thead>
        <tbody>


            <?php
            if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {

                foreach ($_SESSION['carrinho'] as $id_produto => $quantidade) {
                    $dados = $produto->Listar1Produto($id_produto);

                    if (isset($dados) && !empty($dados)) { ?>
                        <tr>
                            <td>
                                <a href="produto-selecionado.php?=<?= $dados['id'] ?>"><img src="assets/img/produtos/<?= $dados['imagem'] ?>" alt="<?= $dados['nome'] ?>" class="caixa-produto"></a>
                                <label><?= $dados['nome'] ?></label>
                            </td>
                            <td>R$ <span><?= $dados['preco'] ?></span></td>
                            <td><a href="carrinho.php?subtrair=<?= $dados['id'] ?>" style="text-decoration: none; color:black"> - </a> <?= $quantidade ?> <a href="carrinho.php?adicionar=<?= $dados['id'] ?>" style="text-decoration: none; color:black"> + </a></td>
                            <td>R$ <span><?= $dados['preco'] * $quantidade ?></span></td>
                            <td><a href="carrinho.php?deletar=<?= $dados['id'] ?>"><button class="btn-deletar"></button></a></td>
                        </tr>
            <?php }
                }
            } ?>
        </tbody>
    </table>
    <?= isset($_SESSION['usuario']) ? '<button class="botao-click"><a href="finalizar-compra.php" style="text-decoration: none; color:white">Finalizar pedido</a></button>' : ''; ?>


</section>

<script src="./assets/js/fixarRolagem.js"> </script>
<?php include "./includes/footer.php" ?>