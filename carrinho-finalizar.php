<?php
$title = "Finalizar Compra";
include "./includes/header.php";

echo "<div style='display: none'>";
include "./carrinho.php";
echo "</div>";

if (!isset($_SESSION['usuario'])) {
    echo " <script>history.go(-1);</script>";
    // header('location: index.php');
}

$desconto = 0;

// Verfica se o cupom existe
if ($desconto) {
    # code...
    // Puxa o banco e define o valor na variável
    // $cupom = $banco->puxaDesconto($get[cupom]);
    // $desconto = cupom['desconto'];
}

?>

<main>
    <section id="finalizar-compra">

        <h1>Finalizar Compra</h1>

        <form method="get" class="pedido-dados">
            <div>
                <label for="frete">Inserir cupom: </label>
                <p class="botao-geral"><img src="assets/img/icon/icon-cupom.png" alt=""><input type="search" placeholder="INAUG30" name="cupom"></p>
            </div>
        </form>
        <form action="#" method="GET" class="formulario-pedido">

            <div class="pedido-info caixa">
                <h3>Resumo do pedido</h3>
                <ul>

                    <li></li>
                    <li>Subtotoal: <span>R$ <?= number_format($_SESSION['total'], 2, ',', '.') ?></span></li>
                    <li>desconto: <span>R$ <?= number_format($_SESSION['total'] - $desconto, 2, ',', '.') ?></span> </li>
                    <li>total: <span></span> </li>
                </ul>
            </div>
        </form>
    </section>
</main>
<?php include "./includes/footer.php" ?>