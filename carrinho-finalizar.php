<?php
$title = "Finalizar Compra";
include "./includes/header.php";

if (!isset($_SESSION['usuario'])) {
    echo" <script>history.go(-1);</script>";
    // header('location: index.php');
}

?>

<main>
    <section id="finalizar-compra">

        <h1>Finalizar Compra</h1>

        <form action="#" class="formulario-pedido">
            <div class="pedido-dados">
                <div>
                    <label for="frete">Cadastar cupom: </label>
                    <p class="botao-geral"><img src="assets/img/icon/icon-cupom.png" alt=""><input type="search" placeholder="INAUG30"></p>
                </div>
            </div>

            <div class="pedido-info caixa">
                <h3>Resumo do pedido</h3>
                <ul>
                    <li></li>
                    <li>Subtotoal: <span></span></li>
                    <li>Frete: <span></span></li>
                    <li>desconto: <span></span></li>
                    <li>total: <span></span></li>
                </ul>
            </div>
        </form>
    </section>
</main>
<?php include "./includes/footer.php" ?>