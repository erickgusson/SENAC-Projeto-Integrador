<?php
$title = "Página de Usuário";
include "./includes/header.php";


if (isset($_POST) && !empty($_POST)) {

    $user = $_POST['email'];
    $password = $_POST['senha'];

    $conexao = new PDO("mysql:host=localhost;dbname=db_usuarios", "root", "");

    $script = "SELECT * FROM tb_usuario WHERE email ='{$user}' AND senha = '{$password}'";

    $resultado = $conexao->query($script)->fetch();
}
?>

<div id="login-cadastro">
    <form action="#" method="POST" class="caixa ">
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

    <div class="botao-cadastrar" id="mostrar-cadastro">
        <span>Não possui um conta?</span>
        <button onclick="javascript:mostrarCadastro()" class="botao-click">CADASTRAR</button>
    </div>
</div>

<?php include "./includes/footer.php" ?>