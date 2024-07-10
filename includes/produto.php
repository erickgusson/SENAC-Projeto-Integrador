<?php

foreach ($dados as $valor) { ?>

    <a href="produto-selecionado.php?id=<?= $valor['id'] ?>" class="item">
        <img src="assets/img/produtos/<?= $valor['imagem'] ?>.png" alt="">
        <p><?= $valor['nome'] ?></p>
        <p>R$ <?= number_format($valor['preco'], 2, '.', ',') ?></p>
        <button class="adicionar">Adicionar ao Carrinho</button>
    </a>
 
<?php } ?>
