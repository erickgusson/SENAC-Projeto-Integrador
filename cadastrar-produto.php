<?php
$title = "Cadastrar Produto";
include "./includes/header.php";
include "./classes/Produto.php";

$cadastro = new Produto();

// Para cadastrar produtos
if (isset($_POST) && !empty($_POST)) {

    // echo '<pre>';
    // print_r($_POST);
    $imagem = $_FILES['upload'];
    // print_r($imagem);

    $nomeCaminhoDaImagem = 'assets/img/produtos/' . round(microtime(true)) . $imagem['name'];
    move_uploaded_file($imagem['tmp_name'], $nomeCaminhoDaImagem);
    // echo $nomeCaminhoDaImagem;

    $imagemNome = round(microtime(true)) . $imagem['name'];
    $nome = $_POST['nome_produto'];
    $preco = $_POST['preco_produto'];
    $descricao = $_POST['descricao_produto'];
    $ingredientes = $_POST['ingredientes'];

    $cadastro->CadastrarProduto($imagemNome, $nome, $descricao, $ingredientes, $preco);
    // echo '</pre>';
}

?>



<main>

    <h1>Cadastrar Produto</h1>

    <div id="cadastro-produto">

        <form action="#" method="POST" class="caixa" enctype="multipart/form-data">
            <section class="esquerda">
                <!-- Nome do Produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-produto.png" alt="">
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do Produto" required>
                </span>

                <!-- Preço do produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-pagamento.png" alt="">
                    <input type="number" min=0 step="0.01" name="preco_produto" id="preco" placeholder="Preço do Produto" required>
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
                <label for="upload" class="botao-geral"><img src="assets/img/icon/icon-upload.png" alt="" required>Enviar imagem (.png)</label>
                <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden required>
                <label for="upload"><img id="imagem-preview" width="250" height="250" class="caixa-produto"></label>
            </section>
            <input type="submit" value="Cadastrar" class="botao-click">

            <!-- <select name="tag" id="tag">
                <option value="torta">Torta</option>
                <option value="Bolo">Bolo</option>
                <option value="Cookie">Cookie</option>
                <option value="Diet">Diet</option>
                <option value="Mousse">Mousse</option>
                <option value="Massas">Massas</option>
                <option value="Cones">Cones</option>
                <option value="Frutas">Frutas</option>
                <option value="Sorvetes">Sorvetes</option>
                <option value="Docinhos">Docinhos</option>
                <option value="Especiais">Especiais</option>
            </select> -->
        </form>
    </div>

</main>


<?php include "./includes/footer.php" ?>