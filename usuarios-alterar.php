<?php $title = "Alterar usuarios";
include "./includes/header.php";
include "./classes/Classe-User.php";

if (empty($_SESSION['usuario']) || !isset($_SESSION['usuario']) || $_SESSION['nivel'] == "user") {
    echo "<script>history.go(-1);</script>";
}

$editar = new User();

include './classes/conexao.php';
$script = "SELECT tb_user.id, id_usuario, foto_perfil, nome, email, nivel, status FROM tb_pessoa INNER JOIN tb_user on tb_pessoa.id = tb_user.id_usuario";
$dados = $conexao->query($script)->fetchAll();

$conexao = null;

// echo "<pre>";
// print_r($dados);
// echo "</pre>";

if (isset($_POST['atualizar-status'])) {
    // print_r($_POST);

    $editar->AlterarUsuario($_POST['id'], $_POST['atualizar-status']);
    header('location: usuarios-alterar.php');
}

if (isset($_POST['deletarUser'])) {
    // print_r($_POST);

    $editar->DeletarUsuario($_POST['id'], $_POST['id_usuario']);
    header('location: usuarios-alterar.php');
}

?>


<script>
    function confirmarEnvio(event) {
        // Mostrar a caixa de confirmação
        var confirmacao = confirm("Você realmente deseja enviar o formulário?");

        // Se o usuário clicar em 'Cancel', evitar o envio do formulário
        if (!confirmacao) {
            event.preventDefault(); // Evita o envio do formulário
        }
    }
</script>

<section id="alterar-usuarios">

    <h1>Alterar Usuários</h1>

    <table class="caixa">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto de perfil</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nivel</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($dados as $usuario) {
            ?>

                <tr>
                    <td> <?= $usuario['id'] ?> </td>
                    <td> <img src="./assets/img/user/<?= $usuario['foto_perfil'] ?>" alt="<?= $usuario['foto_perfil'] ?>" height="100px" width="100"></td>
                    <td> <?= $usuario['nome'] ?> </td>
                    <td> <?= $usuario['email'] ?> </td>
                    <td> <?= $usuario['nivel'] ?> </td>
                    <td>
                        <form action="#" method="POST" onsubmit="confirmarEnvio(event)">
                            <input type="number" hidden name="id" value="<?= $usuario['id'] ?>">
                            <button type="submit" name="atualizar-status" value="<?= $usuario['status'] ?>" class="botao-onoff">
                                <?= ($usuario['status'] == 1) ? 'desativar' : 'ativar'; ?>
                            </button>
                        </form>
                        <form action="#" method="POST" onsubmit="confirmarEnvio(event)">
                            <button class="btn-deletar" name="deletarUser"></button>
                            <input type="number" hidden name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                            <input type="number" hidden name="id" value="<?= $usuario['id'] ?>">
                        </form>
                    </td>
                </tr>

            <?php
            }
            ?>


        </tbody>
    </table>
</section>
<br>

<?php include './includes/footer.php' ?>