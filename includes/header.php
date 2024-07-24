<!DOCTYPE html>
<html lang="pt-br">

<?php session_start(); ?>


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
    <link rel="stylesheet" href="assets/css/cadastrar-produto.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
    <link rel="stylesheet" href="assets/css/editar-produto.css">

    <link rel="shortcut icon" href="assets/img/logo/logo-aba.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>

<body>

        <header id="menu">
            <nav class="nav">
                <div class="row logo">
                    <div class="col ">
                        <a href="index.php"><img src="assets/img/logo/Logo.png" alt="Logo"></a>
                    </div>

                    <div class="col">
                        <h1>Doces Lunares</h1>
                    </div>
                   
                    <?php
                    if (isset($_SESSION['usuario'])) { ?>
                        <button onclick="toggleSidebar()"><img src="assets/img/<?= (isset($_SESSION['foto_perfil'])) ? $_SESSION['foto_perfil'] : ''; ?>" class="caixa" alt="Perfil"></button>

                        <div class="sidebar" id="sidebar">

                            <section class="sidebar-fechar">
                                <button class="fechar" onclick="fechar()">X</button>
                            </section>

                            <section class="sidebar-usuario">
                                <button onclick="toggleSidebar()"><img src="assets/img/<?= (isset($_SESSION['foto_perfil'])) ? $_SESSION['foto_perfil'] : ''; ?>" class="caixa" alt="Perfil"></button>
                                <h2 class="nomeLogin"><?= $_SESSION['usuario'] ?></h2>
                            </section>

                            <ul>
                                <li></li>
                                <li><a href="perfil.php?id=<?=$_SESSION['id']?>">Perfil</a></li>
                                <?= ($_SESSION['nivel'] !== "user") ? '<li><a href="cadastrar-produto.php">Cadastrar Produto</a></li>' : "" ?>
                                <?= ($_SESSION['nivel'] !== "user") ? '<li><a href="editar-produto.php">Editar Produto</a></li>' : "" ?>
                                <?= ($_SESSION['nivel'] !== "user") ? '<li><a href="alterar-usuarios.php">Alterar Usuarios</a></li>' : "" ?>
                                <li><a href="finalizar-compra.php">Finalizar compras</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>

                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="index.php" class="botao-geral"><img src="assets/img/icon/icon-home.png" alt="icone de uma casa representando a aba início/home">Início</a>
                        <?= (isset($_SESSION['usuario'])) ? '<a href="carrinho.php" class="botao-geral"><img src="assets/img/icon/icon-carrinho.png" alt="icone de carrinho de compras">Carrinho</a>' : '<a href="login-cadastro.php" class="botao-geral"><img src="assets/img/icon/icon-carrinho.png" alt="icone de carrinho de compras">Carrinho</a>' ?>                   
                        <a href="produtos.php" class="botao-geral"><img src="assets/img/icon/icon-produtos.png" alt="icone de um shop representando a aba de produtos">Produtos</a>
                        <a href="sobre.php" class="botao-geral"><img src="assets/img/icon/icon-quem-somos.png" alt="icone de uma pessoa representando a aba de Quem somos? ">Quem somos</a>
                        <?= (isset($_SESSION['usuario'])) ? '' : '<a href="login-cadastro.php" class="botao-geral"><img src="assets/img/icon/icon-login.png" alt="icone de uma porta de entrada representando a aba de login">Login</a>' ?>
                    </div>
                </div>
            </nav>
        </header>
        