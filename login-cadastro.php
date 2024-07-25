<?php
$title = "Login/Cadastro";
include "./includes/header.php";
include "./classes/User.php";

if (isset($_SESSION['usuario'])) {
    echo "<script>history.go(-1);</script>";
    // header('location: index.php');
}

// =============  Para Logar ============= 
if (
    isset($_POST['email']) && 
    isset($_POST['senha'])
) {
    $usuario = $_POST['email'];
    $password = $_POST['senha'];

    $user = new User();
    $resultadoLogin = $user->Logar($usuario, $password);
    $_POST['email'];
    $_POST['senha'];
}

//============= Para cadastrar ============= 
if (
    isset($_POST['nome'])
) {
    $nome = $_POST['nome'];
    $email = $_POST['emailCadastro'];
    $senha = $_POST['senhaCadastro'];
    $confirmarSenha = $_POST['senhaCadastro2'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $user = new User();
    $resultadoCadastro = $user->Cadastrar($nome, $email, $senha, $confirmarSenha, $telefone, $cep, $rua, $numero, $bairro, $cidade);
}
?>

<!-- <?= var_dump($resultadoLogin); ?> -->
<div id="login-cadastro">
    <form action="#" method="POST" class="caixa" id="form-login">
        <h2>LOGIN</h2>

        <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="icone de carta representando email">
            <input type="text" name="email" id="email" placeholder="Email" required>
        </span>

        <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
        </span>

        <span class="login-mensagem">
            <?php
            if (!empty($resultadoLogin)) {
                echo $resultadoLogin;
                // header('location:https://www.youtube.com/watch?v=dQw4w9WgXcQ');
            }
            ?>
        </span>

        <input type="submit" value="Entrar" class="botao-click">

    </form>

    <form action="#" method="POST" class="caixa caixa-cadastro escondido" id="form-cadastro">
        <h2>CADASTRAR</h2>

        <div class="campos">

            <!-- Nome -->
            <span class="botao-geral"><img src="assets/img/icon/icon-user.png" alt="icone representando usuário ">
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
            </span>

            <!-- Email -->
            <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="icone de carta representando email">
                <input type="email" name="emailCadastro" id="email" placeholder="Email" required>
            </span>
        </div>

        <div class="campos">

            <!-- Senha -->
            <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                <input type="password" name="senhaCadastro" id="senha" placeholder="Senha" required>
            </span>

            <!-- Confirmar Senha -->
            <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                <input type="password" name="senhaCadastro2" id="senha2" placeholder="Confirmar Senha" required>
            </span>
        </div>

        <h2 class="dados-pessoais">Dados Pessoais</h2>

        <div class="campos">

            <!-- Telefone -->
            <span class="botao-geral"><img src="assets/img/icon/icon-telefone.png" alt="icone de telefone">
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
            </span>

            <!-- CEP -->
            <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                <input type="text" name="cep" id="cep" placeholder="CEP" required>
            </span>
        </div>

        <div class="campos">

            <!-- Rua -->
            <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                <input type="text" name="rua" id="rua" placeholder="Rua" required>
            </span>

            <!-- Nº -->
            <span class="botao-geral"><img src="assets/img/icon/icon-home.png" alt="icone de uma casa">
                <input type="text" name="numero" id="numero" placeholder="Nº" required>
            </span>
        </div>

        <div class="campos">

            <!-- Bairro -->
            <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
            </span>

            <!-- Cidade -->
            <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
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