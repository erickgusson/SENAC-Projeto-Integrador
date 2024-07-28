<?php
$title = "Editar Perfil";
include "./classes/Classe-User.php";
include "./includes/header.php";

if (!isset($_SESSION['id_pessoa'])) {
    echo "";
}

$perfil = new User();

$dados = $perfil->VisualizarPerfil($_SESSION['id_pessoa']);



// echo "<pre>";
// print_r($dados);
// echo "</pre>";

if (!empty(isset($_POST['nome'])) && !empty(isset($_POST['emailEditar'])) && !empty(isset($_POST['senhaAtual']))) {
    $imagem = $_FILES['upload'];
    
    $nomeCaminhoDaImagem = 'assets/img/user/' . round(microtime(true)) . $imagem['name'];
    move_uploaded_file($imagem['tmp_name'], $nomeCaminhoDaImagem);
    $imagem = $imagem['name'];

    if (!empty($imagem)) {
        $imagem = round(microtime(true)) . $imagem;
    }

    $nome = $_POST['nome'];
    $email = $_POST['emailEditar'];
    $senha = $_POST['senhaAtual'];

    if (!empty($_POST['senhaNova'])) {
        $senhaNova = $_POST['senhaNova'];
    } else {
        $senhaNova = $_POST['senhaAtual'];
    }

    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $perfil->EditarPerfil($_SESSION['id'], $_SESSION['id_pessoa'], $imagem, $nome, $email, $senhaNova, $telefone, $cep, $rua, $numero, $bairro, $cidade);
    echo "<script>window.location.href = 'logout.php';</script>";
}
?>

<h1>Editar Perfil</h1>
<div id="editar-perfil">
    <form action="#" method="POST" class="caixa caixa-editar" id="form-cadastro" enctype="multipart/form-data">

        <div>
            <h2>Dados de Usuário</h2>
            <section class="container-perfil">

                <div class="foto-perfil">
                    <section class="foto">
                        <!-- Enviar Imagem -->
                        <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden>
                        <label for="upload"><img id="imagem-preview" width="250" height="250" class="caixa-produto" style="cursor: default; padding: 0; border-radius: 100%;" src="assets/img/user/<?= $dados['foto_perfil'] ?>"><br></label>
                        <label for="upload" class="botao-geral" style="cursor: pointer" ;><img src="assets/img/icon/icon-upload.png" alt="">Enviar imagem (.png)</label>
                    </section>
                </div>

                <div class="dados-user">

                    <div class="campos">

                        <!-- Nome -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-user.png" alt="icone representando usuário ">
                            <!-- <span style="opacity: .5;">Nome</span> -->
                            <input type="text" name="nome" id="nome" placeholder="Nome" required value="<?= $dados['nome'] ?>">
                        </span>

                        <!-- Email -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="icone de carta representando email">
                            <!-- <span style="opacity: .5;">Email</span> -->
                            <input type="email" name="emailEditar" id="email" placeholder="Email" required value="<?= $dados['email'] ?>">
                        </span>
                    </div>

                    <div class="campos">

                        <!-- Senha -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                            <!-- <span style="opacity: .5;">Senha</span> -->
                            <input type="password" name="senhaAtual" id="senhaAtual" placeholder="Senha atual" readonly required value="<?= $dados['senha'] ?>">
                        </span>

                        <!-- Nova Senha -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                            <!-- <span style="opacity: .5;">Nova senha</span> -->
                            <input type="password" name="senhaNova" id="senhaNova" placeholder="Nova senha">
                        </span>
                    </div>
                </div>

                <div class="dados-pessoais" id="teste">
                    <h2>Dados Pessoais</h2>

                    <div class="campos">

                        <!-- Telefone -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-telefone.png" alt="icone de telefone">
                            <!-- <span style="opacity: .5;">Tel</span> -->
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" required value="<?= $dados['telefone'] ?>">
                        </span>

                        <!-- CEP -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                            <!-- <span style="opacity: .5;">CEP</span> -->
                            <input type="text" name="cep" id="cep" placeholder="CEP" required value="<?= $dados['CEP'] ?>">
                        </span>
                    </div>

                    <div class="campos">

                        <!-- Rua -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                            <!-- <span style="opacity: .5;">Rua</span> -->
                            <input type="text" name="rua" id="rua" placeholder="Rua" required value="<?= $dados['rua'] ?>">
                        </span>

                        <!-- Nº -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-home.png" alt="icone de uma casa">
                            <!-- <span style="opacity: .5;">Numero</span> -->
                            <input type="text" name="numero" id="numero" placeholder="Nº" required value="<?= $dados['numero'] ?>">
                        </span>
                    </div>

                    <div class="campos">

                        <!-- Bairro -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                            <!-- <span style="opacity: .5;">Bairro</span> -->
                            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required value="<?= $dados['bairro'] ?>">
                        </span>

                        <!-- Cidade -->
                        <span class="botao-geral"><img src="assets/img/icon/icon-mapa.png" alt="icone de um pinmap">
                            <!-- <span style="opacity: .5;">Cidade</span> -->
                            <input type="text" name="cidade" id="cidade" placeholder="Cidade" required value="<?= $dados['cidade'] ?>">
                        </span>
                    </div>
                </div>

            </section>
        </div>

        <!-- Cadastrar -->
        <input type="submit" value="Atualizar" class="botao-click">
    </form>
</div>



<?php include "./includes/footer.php"; ?>