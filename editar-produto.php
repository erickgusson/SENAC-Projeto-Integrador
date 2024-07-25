<?php
$title = "Editar Produto";
include "./includes/header.php";
include "./classes/Produto.php";


$editar = new Produto();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $dados = $editar->Listar1Produto($id, 2);
} else {
    header('location: produtos.php');
}


if (isset($_POST) && !empty($_POST)) {


    $imagem = $_FILES['upload'];

    $nomeCaminhoDaImagem = 'assets/img/produtos/' . round(microtime(true)) . $imagem['name'];
    move_uploaded_file($imagem['tmp_name'], $nomeCaminhoDaImagem);


    $imagem = $imagem['name'];
    $nome = $_POST['nome_produto'];
    $preco = $_POST['preco_produto'];
    $descricao = $_POST['descricao_produto'];
    $ingredientes = $_POST['ingredientes'];

    $editar->EditarProduto($imagem, $nome, $descricao, $ingredientes, $preco, $id);
}
?>


<main>

    <h1>Editar Produto</h1>

    <div id="cadastro-produto">

        <form action="#" method="POST" class="caixa" enctype="multipart/form-data">
            <section class="esquerda">
                <!-- Nome do Produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-produto.png" alt="">
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do Produto" value="<?= $dados['nome'] ?>" required>
                </span>

                <!-- Preço do produto -->
                <span class="botao-geral"><img src="assets/img/icon/icon-pagamento.png" alt="">
                    <input type="number" min=0 step="0.01" name="preco_produto" id="preco" placeholder="Preço do Produto" value="<?= $dados['preco'] ?>" required>
                </span>

                <!-- Descrição do Produto -->
                <span class="botao-geral textarea">
                    <label for="descricao_produto">Descrição do Produto</label>
                    <textarea name="descricao_produto" id="descricao_produto" rows="3" cols="40" placeholder="Descrição do Produto" required><?= $dados['descricao'] ?></textarea>
                </span>

                <!-- Ingredientes -->
                <span class="botao-geral"><img src="assets/img/icon/icon-ingredientes.png" alt="">
                    <input type="text" name="ingredientes" id="ingredientes" placeholder="Ingredientes: (exemplo: Ovo, Leite...)" value="<?= $dados['ingredientes'] ?>" required>
                </span>
            </section>

            <section class="direita">
                <!-- Enviar Imagem -->
                <label for="upload" class="botao-geral"><img src="assets/img/icon/icon-upload.png" alt="">Enviar imagem (.png)</label>
                <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden>
                <label for="upload"><img id="imagem-preview" width="250" height="250" class="caixa-produto" src="./assets/img/produtos/<?= $dados['imagem'] ?>"></label>
            </section>

            <input type="submit" value="Atualizar" class="botao-click">

        </form>

        <form action="#" method="post">
            
            <?= ($dados['status'] == 1) ? 'ativar' : 'desativar'; ?>
        </form>

    </div>

</main>


<?php include "./includes/footer.php" ?>