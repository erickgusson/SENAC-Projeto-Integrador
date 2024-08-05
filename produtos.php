<?php
$title = "Produtos";
include "./includes/header.php";
include "./classes/Classe-Produto.php";

// Define o $produto como classe
$produto = new Produto();
$dados = $produto->ListarProdutos(1); // Lista todos os produtos do banco

//executa a função de buscar o produto pelo nome através da barra de pesquisa
if (isset($_GET['busca']) && !empty($_GET['busca'])) {
    $busca = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['busca']); // evita caracteres que deem conflito com o script
    $dados = $produto->Pesquisar($busca);
}

// Adiciona produtos ao carrinho
if (isset($_GET['produto-adicionar']) && !empty($_GET['produto-adicionar'])) {
    $id_produto = $_GET['produto-adicionar'];
    header('location: produtos.php');
    $_SESSION['carrinho'][$id_produto]++; // para definir e adicionar o produto na session carrinho
}
// print_r($_SESSION);

if (isset($_GET['tag'])) {
    $dados = $produto->FiltrarProduto($_GET);
}

?>

<style>
    .escondido {
        <?= ($_SESSION['nivel'] == "admin") ? 'display: flex !important' : '' ?>
    }
</style>


<section>
    <main id="produtos" class="col">

        <form method="GET" action="#" class="produtos-esquerda caixa">
            <div>
                <h2>Filtro</h2>
            </div>
            <ul>
                <li><label for="Bolo">      Bolo</label><input type="checkbox" name="tag[]" value="Bolo" id="Bolo" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Cones">     Cones</label><input type="checkbox" name="tag[]" value="Cones" id="Cones" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Cookie">    Cookie</label><input type="checkbox" name="tag[]" value="Cookie" id="Cookie" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Diet">      Diet</label><input type="checkbox" name="tag[]" value="Diet" id="Diet" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Docinhos">  Docinhos</label><input type="checkbox" name="tag[]" value="Docinhos" id="Docinhos" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Especiais"> Especiais</label><input type="checkbox" name="tag[]" value="Especiais" id="Especiais" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Frutas">    Frutas</label><input type="checkbox" name="tag[]" value="Frutas" id="Frutas" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Massas">    Massas</label><input type="checkbox" name="tag[]" value="Massas" id="Massas" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Mousse">    Mousse</label><input type="checkbox" name="tag[]" value="Mousse" id="Mousse" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Sorvetes">  Sorvetes</label><input type="checkbox" name="tag[]" value="Sorvetes" id="Sorvetes" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Torta">     Torta</label><input type="checkbox" name="tag[]" value="Torta" id="Torta" onclick="desmarcarCampoTodos()"></li>
                <li><label for="Todos">     TODOS</label><input type="checkbox" name="todos" id="Todos" onclick="checkTodos(this)"></li>

            </ul>
            <button type="submit" name="filtrar">Filtrar</button>


        </form>

        <div class="produtos-meio">
            <form method="GET" action="produtos.php" class="titulo-produtos">
                <h2>TODOS</h2>
                <span class="botao-geral"><button style="background: none; cursor:pointer;"><img src="assets/img/icon/icon-pesquisar.png" alt=""></button><input type="search" name="busca"></span>
            </form>

            <div class="lista-produtos">
                <?php include "./includes/include-produto.php"; ?>
            </div>
        </div>

        <div class="produtos-direita caixa">

            <div>
                <h2>Carrinho</h2>
            </div>

            <div class="carrinho">

                <?php if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) { //Verifica se há itens no carrinho.
                    foreach ($_SESSION['carrinho'] as $id_produto => $quantidade) { // vai ler o carrinho como id_produto e as quantidades
                        $dados = $produto->Listar1Produto($id_produto, 1); // Vai puxar um produto (selecionado) e listar no carrinho.
                        if (isset($dados) && !empty($dados)) { // Verifica se existe o produto
                            if ($dados['status'] == 0) { // se o produto fora inativo remove automaticamente do carrinho
                                unset($_SESSION['carrinho'][$dados['id']]);
                            }
                ?>
                            <!-- Aqui o produto é apresentado na tela -->
                            <div class="carrinho-item">
                                <img class="caixa-produto" src="assets/img/produtos/<?= $dados['imagem'] ?>" alt="Foto de <?= $dados['nome'] ?>">
                                <h2><?= $quantidade; ?> x</h2> <!-- quantidade -->
                            </div>
                <?php }
                    }
                } ?>
            </div>

            <a href="carrinho.php"><button class="adicionar">Ir para o carrinho</button></a>
        </div>
    </main>
</section>

<script src="./assets/js/fixarRolagem.js"> </script>

<?php include "./includes/footer.php" ?>

<!-- FUNÇÃO DE MARCAR TODOS OS CHECKBOX -->
<script>
    function checkTodos(padrao) {
        let filtros = document.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < filtros.length; i++) {
            if (filtros[i] != padrao)
                filtros[i].checked = padrao.checked;
        }
    }

    function desmarcarCampoTodos(desmarcar) {
        let filtros = document.getElementById('Todos')
        filtros.checked = false
    }
</script>
</script>