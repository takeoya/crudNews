<?php
include("../models/conexao.php");

$diretorio = "../imagens/";
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
$destino = $diretorio . "/" . $arquivo['name'][0];
$extension = pathinfo($destino, PATHINFO_EXTENSION);
$ImgName = $arquivo['name'][0];

$ImgNameRandom = md5($ImgName) . "." . $extension;

if ($extension == "png") {
    move_uploaded_file($arquivo['tmp_name'][0], $diretorio . "/" . $ImgNameRandom);
} else {
    die("Arquivo não é compatível com o tipo 'PNG'");
}

mysqli_query($conexao, "INSERT INTO imgs(img_nome, img_nomeAleatorio) VALUES ('$ImgName', '$ImgNameRandom')");

$id_imgTable_last = mysqli_insert_id($conexao);




$PostagemUsuarioCodigo = $_POST["postagemUsuarioCodigo"];

$NoticiaTitulo = $_POST["info_titulo"];
$NoticiaCorpo = $_POST["info_corpo"];
$NoticiaData = strtotime($_POST["info_data"]);
$NoticiaData = date('Y-m-d H:i:s', $NoticiaData);

mysqli_query($conexao, "INSERT INTO infos (info_titulo, info_corpo, info_data) VALUES ('$NoticiaTitulo', '$NoticiaCorpo', '$NoticiaData');");

$id_noticiaInfo_last = mysqli_insert_id($conexao);


mysqli_query($conexao, "INSERT INTO noticias (noticia_img_Id, noticia_info_id, noticia_usuario_id) 
VALUES ('$id_imgTable_last', '$id_noticiaInfo_last' , '$PostagemUsuarioCodigo');");

header("location:../views/painel.php");

?>