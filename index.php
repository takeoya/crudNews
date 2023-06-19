<?php
include("models/conexao.php");
include("views/blades/header.php");
?>
<style>
    <?php include 'css/style.css'; ?>
</style>
<div class="container p-5 mt-5 rounded" id="mainContent">
<h1 class="fw-bold">Notícias</h1>
<a href="views"></a><button type="button" class="btn btn-success">Success</button>
<hr>
<br>

    <div id="lista-noticias">

        <table width="500px" class="table table-white table-striped table-hover shadow mt-5 ">
            <tr>
                <td>Imagens</td>
                <td>Postagens</td>
            </tr>
            <?php
            $query = mysqli_query($conexao, "SELECT * FROM noticias 
            INNER JOIN imgs ON noticia_img_id = img_id
            INNER JOIN infos ON noticia_info_id = info_id
            INNER JOIN usuarios ON noticia_usuario_id = usuario_id ORDER BY noticia_id DESC");
            while ($exibe = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td class="text-center align-middle">
                        <a class="text-primary" href="views/noticia.php?postagemCodigo=<?php echo $exibe[0] ?>">
                            <img src="imagens/<?php echo $exibe[6] ?>" width="150px">
                    </td>
                    <td class="align-middle p-3">
                        <a class="text-primary" href="views/noticia.php?postagemCodigo=<?php echo $exibe[0] ?>">
                            <!-- Coloco um id chamado blog_codigo no href  -->
                            <h3>
                                <?php echo $exibe[8] ?>
                            </h3>
                        </a>
                        Criado por <b>
                            <?php echo $exibe[12] ?>
                        </b><br>
                        Data:
                        <?php echo $exibe[10] ?>
                        <hr>
                        <?php echo substr($exibe[9], 0, 30) . "..." ?>

                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php include("views/blades/footer.php"); ?>