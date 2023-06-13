<?php
include("../models/conexao.php");

$PostagemCodigo = $_POST["postagemCodigo"];
$NoticiaCodigo = $_POST["noticiaCodigo"];
$UsuarioCodigo = $_POST["postagemUsuarioCodigo"];
$ImagemCodigo = $_POST["imagemCodigo"];


if (!file_exists($_FILES['arquivo']['tmp_name']) || !is_uploaded_file($_FILES['arquivo']['tmp_name'])) {
    echo 'tsk';
} else {
    $diretorio = "../imagens/";
    $file = $_POST['imagemNome'];
    unlink($diretorio . $file);

    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    $destino = $diretorio . "/" . $arquivo['name'];
    $extension = pathinfo($destino, PATHINFO_EXTENSION);
    $ImgName = $arquivo['name'];
    $ImgNameRandom = md5($ImgName) . "." . $extension;

    if ($extension == "png") {
        move_uploaded_file($arquivo['tmp_name'], $diretorio . "/" . $ImgNameRandom);
        mysqli_query($conexao, "UPDATE imgs SET img_nome = '$ImgName', 
        img_nomeAleatorio = '$ImgNameRandom' 
        WHERE img_id = '$ImagemCodigo'");
    }
}


$NoticiaTitulo = $_POST["noticiaTitulo"];
$NoticiaCorpo = $_POST["noticiaCorpo"];
/* $NoticiaData = strtotime($_POST["noticiaData"]);
$NoticiaData = date('Y-m-d H:i:s', $NoticiaData); */

mysqli_query($conexao, "UPDATE noticias SET noticia_usuario_id = $UsuarioCodigo 
WHERE noticia_id='$PostagemCodigo'");



mysqli_query($conexao, "UPDATE infos SET info_titulo = '$NoticiaTitulo',
info_corpo = '$NoticiaCorpo'
WHERE info_id = '$NoticiaCodigo'");

header("location:../views/painel.php");

?>