<?php
$title = "Finalizar Compra";
include "./includes/header.php";

echo "<div style='display: none'>";
include "./carrinho.php";
echo "</div>";

if (!isset($_SESSION['usuario'])) {
    echo "<script>history.go(-1);</script>";
    // header('location: index.php');
}

$desconto = 0;

// Verfica se o cupom existe
if (isset($_GET['cupom'])) {
    $cupom = $_GET['cupom'];

    $cumpomInfo = $produto->ListarDesconto($cupom);

    if (isset($cumpomInfo) && !empty($cumpomInfo)) {
        $desconto = $cumpomInfo['desconto'];
    }

    // Puxa o banco e define o valor na variável
    // $cupom = $banco->puxaDesconto($get[cupom]);
    // $desconto = cupom['desconto'];

    $desconto = $_SESSION['total'] * $desconto / 100;
}

if (!empty(isset($_POST['finalizarpedido']))) {

    if (empty($_SESSION['carrinho'])) {
        echo "<script> alert('Carrinho vazio, adicione itens') </script>";
        echo "<script>window.location.href = 'carrinho.php';</script>";
        exit();
    }

    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {

        foreach ($_SESSION['carrinho'] as $id_produto => $quantidade) {
            $preco = $produto->Listar1Produto($id_produto, 1);
            $produto->VenderProduto($_SESSION['id_pessoa'], $id_produto, $preco['preco'], $quantidade);
        }
    }

    // echo "<pre>";
    // print_r($_SESSION);
    unset($_SESSION['carrinho']);
    // print_r($_SESSION);
    // echo "</pre>";

    echo "<script> alert('Compra finalizado com sucesso') </script>";
    echo "<script>window.location.href = 'carrinho-finalizar.php';</script>";
}

?>

<main>
    <section id="finalizar-compra">

        <h1>Finalizar Compra</h1>
        <!-- Campo de cupom -->
        <form method="get" class="pedido-dados">
            <div style="display: flex; flex-direction: column; gap: 10px; ">
                <label for="frete">Inserir cupom: </label>
                <div style="display: flex; align-items:center;">
                    <p class="botao-geral"><img src="assets/img/icon/icon-cupom.png" alt=""><input type="search" placeholder="INAUG30" name="cupom" value="<?= (isset($cupom)) ? $cupom : '' ; ?>"></p>
                    <button type="submit" id="validar" ></button>
                </div>
            </div>
        </form>

        <!-- Campo de resumo -->
        <form action="#" method="POST" class="formulario-pedido">

            <div class="pedido-info caixa">
                <h3>Resumo do pedido</h3>
                <ul>
                    <li></li>
                    <li>Subtotoal: <span>R$ <?= number_format($_SESSION['total'], 2, ',', '.') ?></span></li>
                    <li>desconto: <span>R$ <?= number_format($desconto, 2, ',', '.') ?></span> </li>
                    <li style="border-top: 1px dashed black; margin-top: 15px;">total: <span>R$ <?= number_format($_SESSION['total'] - $desconto, 2, ',', '.') ?></span> </li>
                </ul>
            </div>
            <button type="submit" class="botao-click" name="finalizarpedido">Finalizar Pedido</button>
        </form>
    </section>
</main>
<?php include "./includes/footer.php" ?>