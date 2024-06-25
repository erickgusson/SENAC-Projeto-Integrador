<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Cadastrar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login-cadastro.css">
    <link rel="stylesheet" href="assets/css/nav-footer.css">


</head>

<?php

if (isset($_POST) && !empty($_POST)) {

    $user = $_POST['email'];
    $password = $_POST['senha'];

    $conexao = new PDO("mysql:host=localhost;dbname=db_usuarios", "root", "");

    $script = "SELECT * FROM tb_usuario WHERE email ='{$user}' AND senha = '{$password}'";

    $resultado = $conexao->query($script)->fetch();
}
?>

    <body>
        <header>
            <nav class="nav">

                <div class="col">
                    <a href="#"><img src="assets/img/logo/Logo.png" alt="Logo"></a>
                </div>

                <div class="col">
                    <h1>Doces Lunares</h1>
                </div>

                <div class="col">
                    <a href="#" class="botao-geral"><img src="assets/img/icon/icon-carrinho.png" alt="">Carrinho</a>
                    <a href="produtos.html" class="botao-geral"><img src="assets/img/icon/icon-pesquisar.png" alt="">Pesquisar</a>
                    <a href="sobre.html" class="botao-geral"><img src="assets/img/icon/icon-quem-somos.png" alt="">Quem somos</a>
                </div>

            </nav>
        </header>
        <div class="login-cadastro">
            <form action="#" method="POST" class="caixa">
                <h2>LOGIN</h2>

                <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </span>

                <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="">
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                </span>

            <?php
            if (isset($_POST) && !empty($_POST)) {
            if (!empty($resultado)) {
                echo 'Conectado com sucesso!';
                header('location:https://www.youtube.com/watch?v=dQw4w9WgXcQ');
            } else {
                echo '<div class="erro-login">Email ou Senha incorretos! Burrão</div>';
                // echo "<script>alert('teste')</script>";
            }
        }
            ?>

            <input type="submit" value="Entrar" class="botao-click">

            <a href="#">Esqueceu sua senha?</a>

            </form>

            <form action="#" method="post" class="caixa caixa-cadastro escondido" id="form-cadastro">
                <h2>CADASTRAR</h2>

                <div class="campos">

                    <!-- Nome -->
                    <span class="botao-geral"><img src="assets/img/icon/icon-user.png" alt="">
                        <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    </span>

                    <!-- Email -->
                    <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="">
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </span>
                </div>

                <div class="campos">

                    <!-- Senha -->
                    <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="">
                        <input type="password" name="senha" id="senha" placeholder="Senha" required>
                    </span>

                    <!-- Confirmar Senha -->
                    <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="">
                        <input type="password" name="senha2" id="senha2" placeholder="Confirmar Senha" required>
                    </span>
                </div>

                <h2 class="dados-pessoais">Dados Pessoais</h2>

                <div class="campos">

                    <!-- Telefone -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="tel" name="telefone" id="telefone" placeholder="Telefone" required>
                    </span>

                    <!-- CEP -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="number" name="cep" id="cep" placeholder="CEP" required>
                    </span>
                </div>

                <div class="campos">

                    <!-- Rua -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="text" name="nome" id="nome" placeholder="Rua" required>
                    </span>

                    <!-- Nº -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="number" name="numero" id="numero" placeholder="Nº" required>
                    </span>
                </div>

                <div class="campos">

                    <!-- Bairro -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
                    </span>

                    <!-- Cidade -->
                    <span class="botao-geral"><img src="assets/img/icon/decoracao-estrela.png" alt="">
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                    </span>
                </div>

                <!-- Cadastrar -->
                <input type="submit" value="Cadastrar" class="botao-click">
            </form>
        </div>

        <div class="botao-cadastrar" id="mostrar-cadastro">
            <span>Não possui um conta?</span>
            <button onclick="javascript:mostrarCadastro()" class="botao-click">CADASTRAR</button>
        </div>

        <footer class="footer">

            <div class="col">
                <a href="#">
                    <img src="assets/img/logo/Logo.png" alt="Logo">
                </a>
            </div>

            <div class="col">
                <h4>Local</h4>
                <p>Rua dos Doceiros <br> 14512-957</p>
            </div>

            <div class="col">
                <h4>Contato</h4>
                <p>(19)3636-3636 <br> (19)99999-9999</p>
            </div>

            <div class="col">
                <h4>Redes sociais</h4>

                <div class="footer-sociais">
                    <a href="#"><img src="assets/img/icon/Whats.png" alt="Contato atraves do WhatsApp"></a>
                    <a href="#"><img src="assets/img/icon/Facebook.png" alt="Contato atraves do Facebook"></a>
                    <a href="#"><img src="assets/img/icon/Insta.png" alt="Contato atraves do Inta"></a>
                </div>

            </div>

            <div class="col">
                <a href="sobre.html">
                    <h4>Quem somos</h4>
                </a>
            </div>

        </footer>
    </body>
    <script src="assets/js/script.js"></script>

</html>