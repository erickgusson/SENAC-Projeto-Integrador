<?php 
$_ENV = parse_ini_file(".env");
$conexao = new PDO("mysql:host={$_ENV['HOST']};dbname={$_ENV['DATABASE']};", $_ENV['USER'], $_ENV['PASSWORD']);
 ?>