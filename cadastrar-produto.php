<?php
$title = "Cadastrar Produto";
include "./includes/header.php"
?>

<main>

    <h1>Cadastrar Produto</h1>

    <div id="cadastro-produto">

        <form action="produto-selecionado.php" method="POST" class="caixa">


            <section class="esquerda">
                <!-- Nome do Produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-produto.png" alt="">
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do Produto" required>
                </span>

                <!-- Preço do produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-pagamento.png" alt="">
                    <input type="number" name="preco_produto" id="preco" placeholder="Preço do Produto" required>
                </span>

                <!-- Descrição do Produto -->
                <span class="botao-geral textarea">
                    <label for="descricao_produto">Descrição do Produto</label>
                    <textarea name="descricao_produto" id="descricao_produto" rows="3" cols="40" placeholder="Descrição do Produto" required></textarea>
                </span>

                <!-- Ingredientes -->
                <span class="botao-geral"><img src="assets/img/icon/icon-ingredientes.png" alt="">
                    <input type="text" name="ingredientes" id="ingredientes" placeholder="Ingredientes: (exemplo: Ovo, Leite...)" required>
                </span>
            </section>

            <section class="direita">
                <!-- Enviar Imagem -->
                <label for="upload" class="botao-geral"><img src="assets/img/icon/icon-upload.png" alt="">Enviar imagem (.png)</label>
                <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden required>
                <img id="imagem-preview" width="250" height="250" class="caixa-produto">
            </section>
        </form>

        <input type="submit" value="Cadastrar" class="botao-click">

    </div>

</main>


<?php include "./includes/footer.php" ?>