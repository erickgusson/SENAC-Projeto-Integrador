<?php
$title = "Carrinho";
include "./includes/header.php";
include "./classes/Classe-Produto.php";

$produto = new Produto();

$_SESSION['total'] = 0;

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
                    $dados = $produto->Listar1Produto($id_produto, 1);

                    if (isset($dados) && !empty($dados)) { ?>
                        <tr>
                            <td style="justify-self: flex-start; width: 100%">
                                <a href="produto-selecionado.php?id=<?= $dados['id'] ?>"><img src="assets/img/produtos/<?= $dados['imagem'] ?>" alt="<?= $dados['nome'] ?>" class="caixa-produto" width="100px" height="100px"></a>
                                <label><?= $dados['nome'] ?></label>
                            </td>
                            <td>R$ <span><?=number_format($dados['preco'], 2, ',', '.') ?></span></td>
                            <td><a class="operacao operacao-menos" href="carrinho.php?subtrair=<?= $dados['id'] ?>"> - </a> </> <?= $quantidade ?> <a class="operacao operacao-mais" href="carrinho.php?adicionar=<?= $dados['id'] ?>"> + </a></></td>
                            <td>R$ <span><?=number_format(($dados['preco'] * $quantidade), 2, ',', '.')?></span></td>
                            
                            <?php $_SESSION['total'] += $dados['preco'] * $quantidade ?>

                            <td><a href="carrinho.php?deletar=<?= $dados['id'] ?>"><button class="btn-deletar"></button></a></td>
                        </tr>
            <?php }
                }
            } ?>
        
            <tr style="border-top: 1px dashed black; padding-top: 10px;">
                <td></td>
                <td></td>
                <td><b> TOTAL: </b></td>
                <td>R$  <?= number_format($_SESSION['total'], 2, ',', '.')?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?= isset($_SESSION['usuario']) ? '<button class="botao-click"><a class="botao-click" href="carrinho-finalizar.php">Finalizar pedido</a></button>' : '<button class="botao-click"><a class="botao-click" href="login-cadastro.php">Finalizar pedido</a></button>'; ?>


</section>

<script src="./assets/js/fixarRolagem.js"> </script>
<?php include "./includes/footer.php" ?>