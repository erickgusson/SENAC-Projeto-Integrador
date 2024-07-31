<?php

$ultimoID = 0;
// echo "<pre>";
foreach ($dados as $valor) {
    // print_r($valor);
    if ($valor['id'] != $ultimoID) {
?>

        <form class="item <?= ($valor['status'] == 0) ? 'escondido' : '' ?>">
            <a href="produto-selecionado.php?id=<?= $valor['id'] ?>">
                <img src="assets/img/produtos/<?= $valor['imagem'] ?>" alt="<?= $valor['nome'] ?>" width="200" height="200">
                <p><?= $valor['nome'] ?></p>
                <p>R$ <?= number_format($valor['preco'], 2, ',', '.') ?></p>
            </a>

            <button class="adicionar" style="position: relative; bottom: 5px;" name="produto-adicionar" value="<?= $valor['id'] ?>">Adicionar ao Carrinho</button>
        </form>

<?php }
$ultimoID = $valor['id'];
}
?>