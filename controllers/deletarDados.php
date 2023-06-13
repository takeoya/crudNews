<?php
include("../models/conexao.php");

$UsuarioCodigo = $_GET["usuario_codigo"];

mysqli_query($conexao, "DELETE from noticias where noticia_usuario_id = $UsuarioCodigo");
mysqli_query($conexao, "DELETE from usuarios where usuario_id = $UsuarioCodigo");

header("location:../views/painel.php");
?>