<?php
include "controllers/cani.php";


?>
<div>

    <div>
        <select name="listaDeDispositivos" id="listaDeDispositivos" style="opacity: 0;width: 0px;"></select>
        <!-- <input type="hidden" name="idusu" id="idusu" value="1"> -->
        <?php
        //date_default_timezone_set('America/Bogota');
        //$image_url = "foto/f".$val[0]['idusu']."_".date('YmdHis').".jpg";
        $image_url = "../foto/f jpg";
        ?>
        <input type="hidden" name="idani" id="idani" value="<?= $image_url; ?>">
        <p id="estado"></p>
    </div>
    <video muted="muted" id="video" class="marfot" style="width: 100px;"></video><br>
    <button id="boton" class="btn btn-primary" style="font-size: 20px;margin-top: 0px;padding: 6px 38px;">Tomar Foto</button><br>
    <canvas id="canvas2" class="marfot maresp" style="display: none;"></canvas>
    
</div>

<form action="home.php?pg=1110" method="POST" name="form1">
    <input type="hidden" name="idani" value="<?=$idani;?>">
    <input type="hidden" name="valor" id="res">
    <input type="hidden" name="ope" value="anlizar">
    <input type="submit" value="Evaluar">
</form>

<?php if ($dtfam) { ?>
    <img src="<?=$dtfam[0]['fam_img'];?>">
    <?=$dtfam[0]['fam_desc'];?>
    <?=$dtfam[0]['fam_recom'];?>
    <div style="display: inlien-block;width: 100px;height: 100px;color: <?=$dtfam[0]['fam_color'];?>;"></div>
<?php } ?>
<script src="js/foto.js">ana();</script>