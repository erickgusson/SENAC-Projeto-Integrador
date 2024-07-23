<?php

foreach ($dados as $valor) { ?>

    <form class="item">
        <a href="produto-selecionado.php?id=<?= $valor['id'] ?>">
            <img src="assets/img/produtos/<?= $valor['imagem'] ?>" alt="<?= $valor['nome'] ?>">
            <p><?= $valor['nome'] ?></p>
            <p>R$ <?= number_format($valor['preco'], 2, '.', ',') ?></p>
        </a>
        <button class="adicionar" style="position: relative; bottom: 5px;" name="produto-adicionar" value="<?= $valor['id'] ?>">Adicionar ao Carrinho</button>
    </form>

<?php } ?>