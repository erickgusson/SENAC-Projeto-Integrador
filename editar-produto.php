<?php
$title = "Editar Produto";
include "./includes/header.php";


?>

<section id="editar-produto" class="caixa">
    <h1>Carrinho</h1>

    <div>
        <section class="container-editar">

            <div class="foto-perfil">
                <section class="foto">
                    <!-- Enviar Imagem -->
                    <input type="file" name="upload" id="upload" accept="image/png" onchange="document.getElementById('imagem-preview').src = window.URL.createObjectURL(this.files[0])" hidden required>
                    <img id="imagem-preview" width="250" height="250" class="caixa-produto" style="cursor: default;"><br>
                    <label for="upload" class="botao-geral" style="cursor: pointer" ;><img src="assets/img/icon/icon-upload.png" alt="">Enviar imagem (.png)</label>
                </section>
            </div>

            <div class="nome-produto">

                <h2>nome</h2>
            </div>

            <div class="icone-editar">
                <h2>nome</h2>

            </div>
    </div>


    <!-- <button class="botao-click">Atualizar</button> -->
</section>


<?php include "./includes/footer.php" ?>