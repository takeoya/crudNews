<?php include("../models/conexao.php");
include("blades/header.php");
?>
<style>
    <?php include '../css/style.css'; ?>
</style>
<?php

?>
<div class="container p-5 mt-5 rounded" id="mainContent">
    <table class="table table-info table-striped table-bordered border-light-emphasis border-5 table-hover">
    

        <?php
        $varPostagemCodigo = $_GET["postagemCodigo"];
        $query = mysqli_query($conexao, "SELECT * FROM noticias 
        INNER JOIN imgs ON noticia_img_id = img_id
        INNER JOIN infos ON noticia_info_id = info_id
        INNER JOIN usuarios ON noticia_usuario_id = usuario_id
        where noticia_id = $varPostagemCodigo");
        while ($exibe = mysqli_fetch_array($query)) {
            ?>
            <h1 class="fw-bold">Notícia</h1>
            <a class="btn btn-primary rounded lbl-button align-end" id="btn-voltar" href="../index.php">Voltar</a>
            <br>
            <tr>
                <td class="text-center align-middle p-5">
                    <img src="../imagens/<?php echo $exibe[6] ?>" width="200px">
                </td>
                <td class="p-5">
                    <h3>
                        <?php echo $exibe[8] ?>
                    </h3>
                    Criado por <b>
                        <?php echo wordwrap($exibe[12], 20, "<br/>", true) ?>
                    </b><br>
                    Data:
                    <?php echo $exibe[10] ?>
                    <hr class="border-2">
                    <?php echo wordwrap($exibe[9], 20, "<br/> ", true) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h4 class="text-center">Confira mais Notícias de
                        <i>
                            <?php echo $exibe[12] ?>:
                        </i>
                    </h4>
                </td>
            </tr>
            <?php
            $queryDois = mysqli_query($conexao, "SELECT * FROM noticias 
                    INNER JOIN imgs ON noticia_img_id = img_id
                    INNER JOIN infos ON noticia_info_id = info_id
                    INNER JOIN usuarios ON noticia_usuario_id = usuario_id where noticia_usuario_id = $exibe[3] and noticia_id != $exibe[0]");
            while ($exibe2 = mysqli_fetch_array($queryDois)) {
                ?>
                <tr>
                    <td class="text-center align-middle">
                        <img src="../imagens/<?php echo $exibe2[6] ?>" width="70px">
                    </td>
                    <td class="align-middle">
                        <p>
                            <?php echo $exibe2[8] ?>
                        </p>
                        <hr>
                        <p>
                            <?php echo substr($exibe2[9], 0, 30) . "..." ?>
                        </p>

                </tr>
                <?php
            }
        } ?>

    </table>
</div>
</body>

</html>