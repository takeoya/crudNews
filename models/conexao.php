<?php
$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "bd_web";

$conexao = mysqli_connect($servidor, $usuario, $senha);
mysqli_select_db($conexao, $banco);
mysqli_set_charset($conexao, "UTF8");
?>