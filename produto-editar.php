<?php

$title = "Editar Produto";
include "./includes/header.php";
include "./classes/Classe-Produto.php";

$editar = new Produto();

// (validação) Verifica se o usuario está vazio ou se não está definido ou se o nivel de acesso é usuário, caso seja ele direciona para a página anterior.
if (empty($_SESSION['usuario']) || !isset($_SESSION['usuario']) || $_SESSION['nivel'] == "user") {
    echo "<script>history.go(-1);</script>";
}

// guarda o id passado no GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dados = $editar->Listar1Produto($id, 2); // listar 1 produto (selecionado)

    // caso o produto não seja encontrado, retonra a pagina de produtos.
    if ($dados == false) {
        header('location: produtos.php?erro=1');
    }
}

// Se o botão foi pressionado ele  envia pro post o atualizar-status e executa a função
if (isset($_POST['atualizar-status'])) {
    $editar->StatusProduto($id, $dados['status']);
}

// Verifica se o botão atualizar foi pressionado e executa a função de atualizar os dados do produto
if (isset($_POST['atualizar']) && !empty($_POST['atualizar'])) {
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
    <?php
    ?>

    <h1>Editar Produto</h1>

    <div id="editar-produto">

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

            <div class="esquerda">
                <span style="display: flex; gap: 10px;">
                    <input type="checkbox" name="atualizar-status" class="botao-click"></input>
                    <?= ($dados['status'] == 1) ? 'Desativar Produto' : 'Ativar Produto'; ?>
                </span>
            </div>

            <div class="direita"><input type="submit" name="atualizar" class="botao-click" value="Atualizar"></div>

        </form>

        <!-- Botão para mostrar a função de ativar e desativar o produto ( para os usuários apenas) -->


    </div>

</main>


<?php include "./includes/footer.php" ?>