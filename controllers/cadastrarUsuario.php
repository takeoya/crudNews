<?php
include("../models/conexao.php");

$usuario_nome = $_POST["usuario_nome"];
$usuario_email = $_POST["usuario_email"];
$usuario_senha = $_POST["usuario_senha"];
$usuario_sexo = $_POST["usuario_sexo"];

mysqli_query($conexao, "INSERT INTO usuarios (usuario_nome, usuario_senha, usuario_email, usuario_sexo) VALUES ('$usuario_nome', '$usuario_email', '$usuario_senha', '$usuario_sexo');");

header("location:../index.php");
?>