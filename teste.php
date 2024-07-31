<?php

include './classes/Classe-Produto.php';

$produto = new Produto();


echo "<pre>";


if (isset($_GET['tag']) && !empty($_GET['tag'])) {

    print_r($_GET);
    $filtros = $_GET['tag'];

    if (isset($_GET['todos']) == "on") {
        $script = "SELECT * FROM tb_produtos_tags INNER JOIN tb_tags ON tb_produtos_tags.id_tag = tb_tags.id";
    } else {
        $script = "SELECT * FROM tb_produtos_tags INNER JOIN tb_tags ON tb_produtos_tags.id_tag = tb_tags.id WHERE tb_tags.tag = '" . implode("' OR tb_tags.tag = '", $filtros) . "'";
    }

    print_r($script);

    include './classes/conexao.php';

    $resultado = $conexao->query($script)->fetchAll();
    // print_r($resultado);

    $conexao = null;

    $ultimoID = 0;
    foreach ($resultado as $resultado) {
        if ($resultado['id_produto'] != $ultimoID) {
            echo "<br>" . $resultado['id_produto'] . "<br>";

            $dados = $produto->Listar1Produto($resultado['id_produto'], 1);

            print_r($dados['nome']);

        }

        $ultimoID = $resultado['id_produto'];
    }

}

?>

<form method="GET" action="#" class="produtos-esquerda caixa">
    <div>
        <h2>Filtro</h2>
    </div>
    <ul>
        <li><label for="Bolo">Bolo</label><input type="checkbox" name="tag[]" value="Bolo" id="Bolo" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Cones">Cones</label><input type="checkbox" name="tag[]" value="Cones" id="Cones" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Cookie">Cookie</label><input type="checkbox" name="tag[]" value="Cookie" id="Cookie" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Diet">Diet</label><input type="checkbox" name="tag[]" value="Diet" id="Diet" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Docinhos">Docinhos</label><input type="checkbox" name="tag[]" value="Docinhos" id="Docinhos" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Especiais">Especiais</label><input type="checkbox" name="tag[]" value="Especiais" id="Especiais" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Frutas">Frutas</label><input type="checkbox" name="tag[]" value="Frutas" id="Frutas" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Massas">Massas</label><input type="checkbox" name="tag[]" value="Massas" id="Massas" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Mousse">Mousse</label><input type="checkbox" name="tag[]" value="Mousse" id="Mousse" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Sorvetes">Sorvetes</label><input type="checkbox" name="tag[]" value="Sorvetes" id="Sorvetes" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Torta">Torta</label><input type="checkbox" name="tag[]" value="Torta" id="Torta" onclick="desmarcarCampoTodos()"></li>
        <li><label for="Todos">TODOS</label><input type="checkbox" name="todos" id="Todos" onclick="checkTodos(this)"></li>
    </ul>
    <button type="submit">Filtrar</button>

    <!-- FUNÇÃO DE MARCAR TODOS OS CHECKBOX -->
    <script>
        function checkTodos(padrao) {
            let filtros = document.querySelectorAll('input[type="checkbox"]');
            for (let i = 0; i < filtros.length; i++) {
                if (filtros[i] != padrao)
                    filtros[i].checked = padrao.checked;
            }
        }

        function desmarcarCampoTodos(desmarcar){
            let filtros = document.getElementById('Todos')
                filtros.checked = false
            }
        
    </script>


</form>