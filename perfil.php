<?php
include "./includes/header.php";

?>

<h1>Editar Perfil</h1>
<div id="editar-perfil">
    <form action="#" method="POST" class="caixa caixa-editar" id="form-cadastro">
        <h2>Dados de Usuário</h2>

        <section class="foto">
            <!-- Enviar Imagem -->
            <label for="upload" class="botao-geral" style="cursor: pointer" ;><img src="assets/img/icon/icon-upload.png" alt="">Enviar imagem (.png)</label>
            <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden required>
            <img id="imagem-preview" width="250" height="250" class="caixa-produto" style="cursor: default;">
        </section>
        <div class="campos">

            <!-- Nome -->
            <span class="botao-geral"><img src="assets/img/icon/icon-user.png" alt="icone representando usuário ">
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
            </span>

            <!-- Email -->
            <span class="botao-geral"><img src="assets/img/icon/icon-email.png" alt="icone de carta representando email">
                <input type="email" name="emaiEditar" id="email" placeholder="Email" required>
            </span>
        </div>

        <div class="campos">

            <!-- Senha -->
            <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                <input type="password" name="senhaAtual" id="senhaAtual" placeholder="Senha atual" required>
            </span>

            <!-- Nova Senha -->
            <span class="botao-geral"><img src="assets/img/icon/icon-senha.png" alt="icone de cadeado">
                <input type="password" name="senhaNova" id="senhaNova" placeholder="Nova senha" required>
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
        <input type="submit" value="Atualizar" class="botao-click">
    </form>
</div>
<div>
    <h1>grid-area: cabecalho; </h1>
    <section class="container-1">
        <div class="item cabecalho">Cabeçalho</div>
        <div class="item menu-lateral">Menu Lateral</div>
        <div class="item principal">Conteúdo Principal</div>
        <div class="item rodape">Rodapé</div>
    </section>
</div>

<?php include "./includes/footer.php" ?>



