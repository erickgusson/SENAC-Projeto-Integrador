<?php
$title = "Cadastrar Produto";
include "./includes/header.php";
include "./classes/Classe-Produto.php";

$cadastro = new Produto();

// (validação) Verifica se o usuario está vazio ou se não está definido ou se o nivel de acesso é usuário, caso seja ele direciona para a página anterior.
if (empty($_SESSION['usuario']) || !isset($_SESSION['usuario']) || $_SESSION['nivel'] == "user") {
    echo "<script>history.go(-1);</script>";
}

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

                <div class="direita">
                    <input type="submit" value="Cadastrar" class="botao-click" >
                </div>
            </section>
            
            

                <!-- <input type="checkbox" name="tag[]" value="Torta" id="Torta"><label for="Torta">Torta</label>
                <input type="checkbox" name="tag[]" value="Bolo" id="Bolo"><label for="Bolo">Bolo</label>
                <input type="checkbox" name="tag[]" value="Cookie" id="Cookie"><label for="Cookie">Cookie</label>
                <input type="checkbox" name="tag[]" value="Diet" id="Diet"><label for="Diet">Diet</label>
                <input type="checkbox" name="tag[]" value="Mousse" id="Mousse"><label for="Mousse">Mousse</label>
                <input type="checkbox" name="tag[]" value="Massas" id="Massas"><label for="Massas">Massas</label>
                <input type="checkbox" name="tag[]" value="Cones" id="Cones"><label for="Cones">Cones</label>
                <input type="checkbox" name="tag[]" value="Frutas" id="Frutas"><label for="Frutas">Frutas</label>
                <input type="checkbox" name="tag[]" value="Sorvetes" id="Sorvetes"><label for="Sorvetes">Sorvetes</label>
                <input type="checkbox" name="tag[]" value="Docinhos" id="Docinhos"><label for="Docinhos">Docinhos</label>
                <input type="checkbox" name="tag[]" value="Especiais" id="Especiais"><label for="Especiais">Especiais</label> -->
          
                <!-- Vídeo do checkbox -->
                <!-- https://www.youtube.com/watch?v=DLdp_RUPeWY -->

        </form>
    </div>

</main>
<?php include "./includes/footer.php" ?>