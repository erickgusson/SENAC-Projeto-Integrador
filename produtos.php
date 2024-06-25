<?php include "./includes/header.php" ?>

<section>
    <main id="produtos" class="col">

        <div class="produtos-esquerda caixa">
            <div>
                <h2>Filtro</h2>
            </div>
            <ul>
                <li>TODOS<input type="checkbox" name="" id="cb-todos"></li>
                <li>Diet<input type="checkbox" name="" id="cb-diet"></li>
                <li>Mousse<input type="checkbox" name="" id="cb-mousse"></li>
                <li>Bolos<input type="checkbox" name="" id="cb-bolos"></li>
                <li>Tortas<input type="checkbox" name="" id="cb-tortas"></li>
                <li>Massas<input type="checkbox" name="" id="cb-"></li>
                <li>Cones<input type="checkbox" name="" id="cb-"></li>
                <li>De frutas<input type="checkbox" name="" id="cb-"></li>
                <li>Sorvetes<input type="checkbox" name="" id="cb-"></li>
                <li>Cookies<input type="checkbox" name="" id="cb-"></li>
                <li>Docinhos<input type="checkbox" name="" id="cb-"></li>
                <li>Especiais<input type="checkbox" name="" id="cb-"></li>
            </ul>
            <button type="button">Filtrar</button>
            <!-- <div class="botao-filtrar">
                </div> -->
        </div>

        <div class="produtos-meio">
            <div class="titulo-produtos">
                <h2>TODOS</h2>
                <span class="botao-geral"><img src="assets/img/icon/icon-pesquisar.png" alt=""><input type="search"></span>
            </div>

            <div class="lista-produtos">
                <?php 
                    for($i=0; $i<50; $i++){
                        include "includes/produto.php";
                    }
                
                ?>
            </div>
        </div>

        <div class="produtos-direita caixa">

            <div>
                <h2>Carrinho</h2>
            </div>

        </div>
    </main>
</section>

<?php include "./includes/footer.php" ?>