<?php
$title = "Produtos";
include "./includes/header.php";
include "./classes/ListarProduto.php";

$produto = new Produto();
$dados = $produto->ListarProdutos(1);

if (isset($_GET['busca']) && !empty($_GET['busca'])) {
    $busca = $_GET['busca'];
    $dados = $produto->Pesquisar($busca);
    // var_dump($dados);
}

if (isset($_GET['produto-adicionar']) && !empty($_GET['produto-adicionar'])) {
    $id_produto = $_GET['produto-adicionar'];
    $_SESSION['carrinho'][$id_produto]++;
}
?>

<section>
    <main id="produtos" class="col">

        <div class="produtos-esquerda caixa">
            <div>
                <h2>Filtro</h2>
            </div>
            <ul>
                <li>TODOS<input type="checkbox" name="" id="cb-todos"></li>
                <li>Diet<input type="checkbox" name="" id="cb-diet"></li>
                <li>Mousse<input type="checkbox" name="" id="cb-mousse"></li>
                <li>Bolos<input type="checkbox" name="" id="cb-bolos"></li>
                <li>Tortas<input type="checkbox" name="" id="cb-tortas"></li>
                <li>Massas<input type="checkbox" name="" id="cb-"></li>
                <li>Cones<input type="checkbox" name="" id="cb-"></li>
                <li>Frutas<input type="checkbox" name="" id="cb-"></li>
                <li>Sorvetes<input type="checkbox" name="" id="cb-"></li>
                <li>Cookies<input type="checkbox" name="" id="cb-"></li>
                <li>Docinhos<input type="checkbox" name="" id="cb-"></li>
                <li>Especiais<input type="checkbox" name="" id="cb-"></li>
            </ul>
            <button type="button">Filtrar</button>
            <!-- <div class="botao-filtrar">
                </div> -->
        </div>

        <div class="produtos-meio">
            <form method="GET" action="produtos.php" class="titulo-produtos">
                <h2>TODOS</h2>
                <span class="botao-geral"><button style="background: none; cursor:pointer;"><img src="assets/img/icon/icon-pesquisar.png" alt=""></button><input type="search" name="busca"></span>
            </form>

            <div class="lista-produtos">
                <?php include "./includes/produto.php"; ?>
            </div>
        </div>

        <div class="produtos-direita caixa">

            <div>
                <h2>Carrinho</h2>
            </div>

        </div>
    </main>
</section>

<script>
    // Salva a posição de rolagem atual no localStorage
    window.onbeforeunload = function() {
        localStorage.setItem('scrollPosition', JSON.stringify({
            x: window.scrollX,
            y: window.scrollY
        }));
    }
    // Restaura a posição de rolagem após o carregamento da página
    window.onload = function() {
        var scrollPosition = JSON.parse(localStorage.getItem('scrollPosition'));
        if (scrollPosition) {
            window.scrollTo(scrollPosition.x, scrollPosition.y);
            localStorage.removeItem('scrollPosition'); // Limpa a posição após restaurar
        }
    }
</script>

<?php include "./includes/footer.php" ?>