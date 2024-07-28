<?php
$cont = 1;
foreach ($maisVendidos as $valor) { ?>
    <a href="produto-selecionado.php?id=<?= $valor['id'] ?>" class="caixa-produto <?= ($valor['status'] == 0) ? 'escondido' : '' ?>">
        <img src="assets/img/produtos/<?= $valor['imagem'] ?>" alt="<?= $valor['nome'] ?>" width="200px" height="200px">
        <figcaption>
            <h4><?= $valor['nome'] ?></h4>
        </figcaption>
    </a>
<?php
    if ($valor['status'] != 0) {
        $cont++;
    }
    if ($cont > 12) {
        break;
    }
}
?>