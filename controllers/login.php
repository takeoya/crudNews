<?php
include("../models/conexao.php");

session_start();

if(empty($_POST) || (empty($_POST["usuario"]) || (empty($_POST["senha"])))){
    print "<script>location.href='../cms/index.php';</script>";
}

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE usuario = '{$usuario}' AND senha = '{$senha}'";

$res = $conn->query($sql) or die($conn->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;

if($qtd > 0){
    $_SESSION["usuario"] = $usuario;
    $_SESSION["email"] = $row->email;

    print "<script>location.href='../views/painel.php';</script>";
}else{
    print "<script>alert('Usuário ou senha incorreta');</script>";
    print "<script>location.href='../cms/index.php';</script>";
}
?>