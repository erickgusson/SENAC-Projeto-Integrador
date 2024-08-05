<?php

$_ENV = parse_ini_file(".env");

class User
{

    public function Logar($user, $password)
    {

        include 'conexao.php';
        $script = "SELECT * FROM tb_user WHERE login = '{$user}' AND senha = '{$password}' AND status = '1'";
        $resultado = $conexao->query($script)->fetch();
        if (!empty($resultado)) {
            session_start();
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['id_pessoa'] = $resultado['id_usuario'];
            $_SESSION['foto_perfil'] = $resultado['foto_perfil'];
            $_SESSION['usuario'] = $resultado['login'];
            $_SESSION['nivel'] = $resultado['nivel'];

            // sleep(5);
            // echo "<script>history.go(-1);</script>";
            $conexao = null;
            return "Logado com sucesso!";
        } else {
            $conexao = null;
            return 'Usuario não encontrado ou desativado.';
        }
    }

    public function Cadastrar($nome, $email, $senha, $confirmarSenha, $telefone, $cep, $rua, $numero, $bairro, $cidade)
    {
        try {
            if (empty($nome) || $nome == null) {
                return "<br>Nome não informado";
            }
            if (empty($email) || $email == null) {
                return "<br>Usuário não informado";
            }

            if (empty($senha) || $senha == null) {
                return "<br>Senha não informada";
            }

            if ($senha != $confirmarSenha) {
                return "<br>Senhas não são iguais";
            }
            if (empty($telefone) || $telefone == null) {
                return "<br>Telefone não informado";
            }
            if (empty($cep) || $cep == null) {
                return "<br>CEP não informado";
            }
            if (empty($rua) || $rua == null) {
                return "<br>Rua não informada";
            }
            if (empty($numero) || $numero == null) {
                return "<br>Número não informado";
            }
            if (empty($bairro) || $bairro == null) {
                return "<br>Bairro não informado";
            }
            if (empty($cidade) || $cidade == null) {
                return "<br>Cidade não informada";
            }

            //Tabela de dados pessoais
            include 'conexao.php';

            $script = "SELECT * FROM tb_user WHERE login = '{$email}' AND status = '1'";
            $resultado1 = $conexao->query($script)->fetch();

            if (!empty($resultado1)) {
                return "login já existe";
            }

            $scriptPessoa = "INSERT INTO tb_pessoa (nome, email, telefone, CEP, cidade, bairro, rua, numero) VALUES (:nome, :email, :telefone, :cep, :cidade, :bairro, :rua, :numero)";
            $resultado = $conexao->prepare($scriptPessoa);

            $resultado->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':cep' => $cep,
                ':cidade' => $cidade,
                ':bairro' => $bairro,
                ':rua' => $rua,
                ':numero' => $numero
            ]);

            // Tabela de usuario
            $id_usuario = $conexao->lastInsertId();
            $scriptUsuario = "INSERT INTO tb_user (id_usuario, login, senha) VALUES (:id, :login, :senha)";

            $preparoUsuario = $conexao->prepare($scriptUsuario)->execute([
                ':id' => $id_usuario,
                ':login' => $email,
                ':senha' => $senha
            ]);

            // header('location: login-cadastro.php');
            $conexao = null;
            return "Usuário cadastrado com sucesso";
        } catch (PDOException $erro) {
            $conexao = null;
            return "Erro <br>" . $erro->getMessage();
        }
    }

    public function VisualizarPerfil($id)
    {
        include 'conexao.php';
        $script = "SELECT * FROM tb_pessoa INNER JOIN tb_user on tb_pessoa.id = tb_user.id_usuario WHERE tb_user.id_usuario =" . $id;
        $dados = $conexao->query($script)->fetch();

        $conexao = null;
        return $dados;
    }

    public function EditarPerfil($id, $id_pessoa, $imagem, $nome, $email, $senhaNova, $telefone, $cep, $rua, $numero, $bairro, $cidade)
    {
        include 'conexao.php';

        if (!empty($imagem)) {
            $scriptUser = "UPDATE tb_user SET login = '$email', senha = '$senhaNova', foto_perfil = '$imagem' WHERE id = '$id'";
        } else {
            $scriptUser = "UPDATE tb_user SET login = '$email', senha = '$senhaNova' WHERE id = '$id'";
        }
        $conexao->prepare($scriptUser)->execute([]);

        $scriptPessoa = "UPDATE tb_pessoa SET nome = '$nome', email = '$email', telefone = '$telefone', CEP = '$cep', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero' WHERE id = '$id_pessoa'";
        $conexao->prepare($scriptPessoa)->execute([]);

        $conexao = null;
    }

    // Falta finalizar a adptaçaõ do código, passar o id corretamente
    public function AlterarUsuario($id, $status)
    {
        include 'conexao.php';

        if ($status == 0) {
            $scriptAlterar = "UPDATE tb_user SET status = '1' WHERE id = '$id'";
        }
        //desativar
        else {
            $scriptAlterar = "UPDATE tb_user SET status = '0' WHERE id = '$id'";
        }

        $conexao->prepare($scriptAlterar)->execute([]);
        $conexao = null;
    }

    public function DeletarUsuario($id, $id_usuario)
    {
        include 'conexao.php';

        $scriptUser = "DELETE FROM tb_user WHERE id = '$id'";
        $scriptPessoa = "DELETE FROM tb_pessoa WHERE id = '$id_usuario'";
        
        $conexao->prepare($scriptUser)->execute([]);
        $conexao->prepare($scriptPessoa)->execute([]);
        $conexao = null;
    }
}
