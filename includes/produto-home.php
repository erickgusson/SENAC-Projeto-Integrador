<?php
$cont = 1;
foreach ($maisVendidos as $valor) { ?>
    <a href="produto-selecionado.php?id=<?= $valor['id'] ?>" class="caixa-produto">
        <img src="assets/img/produtos/<?= $valor['imagem'] ?>.png" alt="<?= $valor['nome'] ?>">
        <figcaption>
            <h4><?= $valor['nome'] ?></h4>
        </figcaption>
    </a>
<?php
    $cont++;
    if ($cont > 12) {
        break;
    }
}
?>