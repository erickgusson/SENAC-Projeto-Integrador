<?php
$title = "Cadastrar Produto";
include "./includes/header.php"
?>

<main>

    <h1>Cadastrar Produto</h1>

    <div id="">

        <form action="#" method="POST">

            <!-- Nome do Produto -->
            <span class="botao-geral"><img src="assets/img/logo/logo-aba.png" alt="">
                <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do Produto" required>
            </span>

            <!-- Preço do produto -->
            <span class="botao-geral"><img src="assets/img/icon/icon-pagamento.png" alt="">
                <input type="number" name="preco_produto" id="preco" placeholder="Preço do Produto" required>
            </span>
    
            <!-- Enviar Imagem -->
             <label for="upload" class="botao-geral">Teste Teste</label>
            <span class="botao-geral"><img src="assets/img/logo/logo-aba.png" alt="">
                <input type="file" name="upload" id="upload" hidden>
            </span>


        </form>
    </div>

</main>


<?php include "./includes/footer.php" ?>