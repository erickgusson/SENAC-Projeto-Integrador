<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) && !empty($title) ? $title . " - Doces Lunares" : "Doces Lunares" ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login-cadastro.css">
    <link rel="stylesheet" href="assets/css/nav-footer.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/finalizar-compra.css">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <link rel="stylesheet" href="assets/css/produto-selecionado.css">
    <link rel="stylesheet" href="assets/css/carrinho.css">
    <link rel="stylesheet" href="assets/css/sobre.css">

    <link rel="shortcut icon" href="assets/img/logo/logo-aba.png" type="image/x-icon">

</head>

<body>

    <main class="home">
        <header id="menu">
            <nav class="nav">
                <div class="row">
                    <div class="col">
                        <a href="index.php"><img src="assets/img/logo/Logo.png" alt="Logo"></a>
                    </div>

                    <div class="col">
                        <h1>Doces Lunares</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="index.php" class="botao-geral"><img src="assets/img/icon/icon-home.png" alt="icone de carrinho de compras">Início</a>
                        <a href="carrinho.php" class="botao-geral"><img src="assets/img/icon/icon-carrinho.png" alt="icone de carrinho de compras">Carrinho</a>
                        <a href="finalizar-compra.php" class="botao-geral"><img src="assets/img/icon/icon-pagamento.png" alt="icone representando um pessoa">Finalizar compras</a>
                        <a href="produtos.php" class="botao-geral"><img src="assets/img/icon/icon-pesquisar.png" alt="icone de lupa">Pesquisar</a>
                        <a href="sobre.php" class="botao-geral"><img src="assets/img/icon/icon-quem-somos.png" alt="icone representando um pessoa">Quem somos</a>
                        <a href="login-cadastro.php" class="botao-geral"><img src="assets/img/icon/icon-login.png" alt="icone representando um pessoa">Login</a>
                    </div>
                </div>  
            </nav>
        </header>