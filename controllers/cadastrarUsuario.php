<?php
include("../models/conexao.php");

$usuario_nome = $_POST["usuario_nome"];
$usuario_email = $_POST["usuario_email"];
$usuario_senha = $_POST["usuario_senha"];

mysqli_query($conexao, "INSERT INTO usuarios (usuario_nome, usuario_senha, usuario_email) VALUES ('$usuario_nome',  '$usuario_senha', '$usuario_email');");

header("location:../index.php");
?>