<?php
include("blades/header.php");
include("../models/conexao.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<?php
$PostagemCodigo = $_GET["postagemCodigo"];
$query = mysqli_query($conexao, "SELECT * FROM noticias
INNER JOIN imgs ON noticia_img_id = img_id
INNER JOIN infos ON noticia_info_id = info_id
INNER JOIN usuarios ON noticia_usuario_id = usuario_id
where noticia_id = $PostagemCodigo");

?>
<div class="container  p-5 rounded shadow" id="painel">
    <table class="table table-info table-bordered table-rounded border-secondary-emphasis table-striped table-hover shadow mt-5">
        <?php

        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <form name="atualizar" action="../controllers/editarNovaNoticia.php" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="postagemCodigo" value="<?php echo $exibe[0] ?>">
                <input type="hidden" name="imagemCodigo" value="<?php echo $exibe[1] ?>">
                <input type="hidden" name="imagemNome" value="<?php echo $exibe[6] ?>">
                <input type="hidden" name="noticiaCodigo" value="<?php echo $exibe[2] ?>">
                <tr>
                    <td class="text-center align-middle"><img src="../imagens/<?php echo $exibe[6] ?>" width="100px"></td>
                    <td class="align-middle p-3">
                        <!-- Coloco um id chamado blog_codigo no href  -->

                        <label class="form-label lbl-input">Título<b></label>
                        <?php echo $exibe[1] ?>
                        <input class="form-control" type="text" name="noticiaTitulo" value="<?php echo $exibe[8] ?>">
                        <br>
                        <label class="form-label lbl-input">Criado Por <b></label>
                        <select id="postagemUsuario" name="postagemUsuarioCodigo" required="postagemUsuario"
                            class="form-select">
                            <option selected value="<?php echo $exibe[3] ?>"><?php echo $exibe[12] ?></option>
                            <?php
                            $res = mysqli_query($conexao, "SELECT * FROM usuarios 
                                WHERE usuario_id != '$exibe[3]' ");
                            while ($row = mysqli_fetch_array($res)) {
                                $usuarioCodigo = $row['usuario_id'];
                                $co_name = $row['usuario_nome'];
                                ?>
                                <option value="<?php echo $usuarioCodigo; ?>"><?php echo $co_name; ?></option>
                            <?php } ?>
                        </select>

                        </b>
                        <hr>
                        <textarea class="form-control" type="text" name="noticiaCorpo"><?php echo $exibe[9] ?>                                       
                                                                </textarea>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle">
                        <label class="form-label lbl-input">Mudar imagem:</label><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                        <input type="file" name="arquivo" />
                    </td>
                    <td class="text-center align-middle">
                        <input class="btn btn-success mt-3" type="submit" value="Atualizar">
                    </td>
                </tr>
            </form>
        <?php } ?>
    </table>
</div>

<?php include("blades/footer.php"); ?>