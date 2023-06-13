<?php
include("../models/conexao.php");
$dir = "../imagens/";
$varPostagemCodigo = $_GET["postagemCodigo"];
$file = $_GET["imagemNome"];
$varNoticiaInfoCodigo = $_GET["noticiaInfoCodigo"];
unlink($dir . $file);
mysqli_query($conexao, "DELETE from noticias where noticia_id = $varPostagemCodigo");
mysqli_query($conexao, "DELETE from infos where info_id = $varNoticiaInfoCodigo");
mysqli_query($conexao, "DELETE from imgs where img_nomeAleatorio = '$file'");
header("location:../views/painel.php");
?>