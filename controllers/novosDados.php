<?php
include("../models/conexao.php");

$UsuarioCodigo = $_POST["userCodigo"];

$usuario_nome = $_POST["userName"];
$usuario_email = $_POST["userEmail"];
$usuario_senha = $_POST["userSenha"];
$usuario_sexo = $_POST["userSexo"];

mysqli_query($conexao, "UPDATE usuarios SET usuario_nome='$usuario_nome', 
                                        usuario_email='$usuario_email',
                                        usuario_senha='$usuario_senha',
                                        usuario_sexo='$usuario_sexo'
                                        WHERE usuario_id= $UsuarioCodigo");

header("location:../views/verUsuarios.php")
    ?>