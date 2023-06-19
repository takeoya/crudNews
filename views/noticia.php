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
            <h1 class="fw-bold"><?php echo $exibe[8] ?></h1><br>
            <a class="btn btn-primary rounded lbl-button align-end" id="btn-voltar" href="../index.php">Voltar</a>
            <br><br>
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
                <?php
            }
          ?>

    </table>
</div>
</body>

</html>