<?php
include("blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>

<div id="menuLeft">
    <a class="btn btn-primary rounded lbl-button" id="btn-voltar" href="../index.php">Voltar</a>
</div>
<div id="formulario">
    <h1>Nova Conta</h1>
    <form action="../controllers/cadastrarUsuario.php" method="post">
        <label class="form-label lbl-input">Nome</label>
        <input class="form-control" type="text" name="usuario_nome">
        <label class="form-label lbl-input">Email:</label>
        <input class="form-control" type="text" name="usuario_email">
        <label class="form-label lbl-input">Senha:</label>
        <input class="form-control" type="text" name="usuario_senha">
        <br>
        <div id="containerBtnSexo">
            <label class="form-label lbl-input">Sexo:</label>
            <div>
                <input type="radio" name="usuario_sexo" value="m" checked>Masculino<br>
                <input type="radio" name="usuario_sexo" value="f">Feminino<br>
            </div>
        </div>
        <input class="btn btn-outline-dark mt-5 " type="submit" value="CadastrarUsuarioBtn">

    </form>
</div>

<?php include("blades/footer.php"); ?>