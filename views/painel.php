<?php
session_start();
if(empty($_SESSION))
{
print "<script>location.href='../cms/index.php';</script>";
}
$usuariocodigo = $_SESSION["usuarioCodigo"];
include("../models/conexao.php");
include("blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>

<div class="container p-5 mt-5 rounded" id="painel">
    <h1 class="fw-bold">Olá <?php echo $_SESSION["usuario"]?>!</h1>
    <a class="fw-bold" href="../controllers/logout.php">Deslogar</a>
    <hr class="border border-dark border-2 opacity-75">
    <br>
    <h3 class="fw-bold">Criar notícia</h3>
    <form name="criarNoticia" action="../controllers/criarNoticia.php" enctype="multipart/form-data" method="post">

        <input type="hidden" name="usuarioCodigo" value="<?php echo $_SESSION["usuarioCodigo"]?>">
        <br>
        <label class="form-label fs-5 lbl-input mt-2">Título:</label>
        <input class="form-control" type="text" name="info_titulo">
        <label class="form-label fs-5 lbl-input mt-2">Notícia:</label>
        <textarea class="form-control" type="text" name="info_corpo"></textarea>
                    
    <br>

    <label class="form-label fs-5 lbl-input mt-3">Imagem da Notícia:</label>
    <div>
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" class="rounded" name="arquivo[]" multiple="multiple"/>
    </div>
    <input class="btn btn-success mt-5 rounded" type="submit" value="Criar Notícia">
    </form>
    
    <br><br><br>
    <hr class="border border-dark border-2 opacity-100">
    <br><br>

    <h3 class="fw-bold">Gerenciar notícias</h3>
    <table class="table table-info table-bordered table-rounded border-secondary-emphasis table-striped table-hover shadow mt-5 ">
        <tr>
            <td class="fw-bold">Imagens</td>
            <td class="fw-bold">Postagens</td>
            <td class="fw-bold">Editar</td>
            <td class="fw-bold">Excluir</td>
        </tr>
        <?php
        $query = mysqli_query($conexao, "SELECT * FROM noticias 
        INNER JOIN imgs ON noticia_img_id = img_id
        INNER JOIN infos ON noticia_info_id = info_id
        INNER JOIN usuarios ON noticia_usuario_id = usuario_id
        ORDER BY noticia_info_id DESC");
        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td class="text-center align-middle"><img src="../imagens/<?php echo $exibe[6] ?>" width="100px"></td>
                <td class="align-middle p-3">
                    <h3>
                        <?php echo $exibe[8] ?>
                    </h3>
                    Criado por <b>
                        <?php echo $exibe[12] ?>
                    </b><br>
                    Data:
                    <?php echo $exibe[10] ?>
                    <hr>
                    <?php echo wordwrap($exibe[9], 20, "<br/> ", true) ?>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-primary d-grid"
                        href="alterarNoticia.php?postagemCodigo=<?php echo $exibe[0]?>">Editar</a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-danger d-grid"
                        href="../controllers/deletarNoticia.php?postagemCodigo=<?php echo $exibe[0] ?>&amp;imagemNome=<?php echo $exibe[6] ?>&amp;noticiaInfoCodigo=<?php echo $exibe[2] ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php include("../views/blades/footer.php");?>