<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) && !empty($title) ? $title . " - Doces Lunares": "Doces Lunares" ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login-cadastro.css"> 
    <link rel="stylesheet" href="assets/css/nav-footer.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/finalizar-compra.css">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <link rel="stylesheet" href="assets/css/produto-selecionado.css">
    <link rel="stylesheet" href="assets/css/carrinho.css">
    <link rel="stylesheet" href="assets/css/sobre.css">

</head>

<body>

    <main class="home">
        <header>
            <nav class="nav">
                <div class="col">
                    <a href="#"><img src="assets/img/logo/Logo.png" alt="Logo"></a>
                </div>

                <div class="col">
                    <h1>Doces Lunares</h1>
                </div>

                <div class="col">
                    <a href="#" class="botao-geral"><img src="assets/img/icon/icon-carrinho.png" alt="icone de carrinho de compras">Carrinho</a>
                    <a href="produtos.php" class="botao-geral"><img src="assets/img/icon/icon-pesquisar.png" alt="icone de lupa">Pesquisar</a>
                    <a href="sobre.php" class="botao-geral"><img src="assets/img/icon/icon-quem-somos.png" alt="icone representando um pessoa">Quem somos</a>
                </div>
            </nav>
        </header>