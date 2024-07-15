<?php

$_ENV = parse_ini_file(".env");

class User
{

    public function Logar($user, $password)
    {

        include 'conexao.php';
        $script = "SELECT * FROM tb_user WHERE login = '{$user}' AND senha = '{$password}'";
        $resultado = $conexao->query($script)->fetch();
        if (!empty($resultado)) {
            return '<span class="login-mensagem">Usuario Validado com sucesso!!!</span>';
            // header('location:index.php');
        } else {
            return '<span class="login-mensagem">Usuario não encontrado.</span>';
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
            $conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};", $_ENV['USER'], $_ENV['PASSWORD']);
            $scriptPessoa = "INSERT INTO tb_pessoa (nome, email, telefone, CEP, cidade, bairro, rua, numero) VALUE (:nome, :email, :telefone, :cep, :cidade, :bairro, :rua, :numero)";

            $preparoPessoa = $conexao->prepare($scriptPessoa);

            $preparoPessoa->execute([
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
            $scriptUsuario = "INSERT INTO tb_user (id_usuario, login, senha, ativo) VALUE (:id, :login, :senha, 1)";

            $preparoUsuario = $conexao->prepare($scriptUsuario);
            $preparoUsuario->execute([
                ':id' => $id_usuario,
                ':login' => $email,
                ':senha' => $senha,
            ]);

            return "Usuário cadastrado com sucesso id: " . $conexao->lastInsertId();
        } catch (PDOException $erro) {
            echo "Erro <br>" . $erro->getMessage();
        }
    }
}
