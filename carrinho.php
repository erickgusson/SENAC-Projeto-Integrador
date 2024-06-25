<?php
include "./includes/header.php"
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="produto-selecionado.php"><img src="assets/img/produtos/CookieNutella.png" alt="Cookie Nutella" class="caixa-produto"></a>
                    <label for="">Cookie Nutella</label>
                </td>
                <td>R$ <span>10,00</span></td>
                <td>2</td>
                <td>R$ <span>20,00</span></td>
                <td><button class="btn-deletar"></button></td>
            </tr>
            <tr>
                <td>
                    <a href="produto-selecionado.php"><img src="assets/img/produtos/CookieNutella.png" alt="Cookie Nutella" class="caixa-produto"></a>
                    <label for="">Cookie Nutella</label>
                </td>
                <td>R$ <span>10,00</span></td>
                <td>2</td>
                <td>R$ <span>20,00</span></td>
                <td><button class="btn-deletar"></button></td>
            </tr>
            <tr>
                <td>
                    <a href="produto-selecionado.php"><img src="assets/img/produtos/CookieNutella.png" alt="Cookie Nutella" class="caixa-produto"></a>
                    <label for="">Cookie Nutella</label>
                </td>
                <td>R$ <span>10,00</span></td>
                <td>2</td>
                <td>R$ <span>20,00</span></td>
                <td><button class="btn-deletar"></button></td>
            </tr>
        </tbody>
    </table>
    <button class="botao-click">Finalizar pedido</button>
</section>


<?php include "./includes/footer.php" ?>