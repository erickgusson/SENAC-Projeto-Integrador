<?php

$_ENV = parse_ini_file(".env");

class User
{

    public function Logar($user, $senha) {
        $conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};",$_ENV['USER'],$_ENV['PASSWORD']);
        $script = "SELECT * FROM tb_user WHERE 'login' = '{$user}' AND senha = '{$senha}'";
        $resultado = $conexao->query($script)->fetch();

        if(!empty($resultado)){
            return "Validado com sucesso!";
        } else{
            return "Usuário não cadastrado!";
        }

        

    }

}
