<?php require_once 'controllers/cper.php'; ?>
<div class="header">
         <p>Perfil</p>
</div>
<br>

<div style="margin-bottom: 150px">
    <div class="conte">
        <div class="inser">
            <form name="frm1" action="home.php?pg=<?=$pg;?>" method="POST">
                <div class="row" style="margin-bottom: 50px">
                    <div class = "form-group col-md-4">
                        <label for="nomper">Nombre de perfil</label>
                        <input type="text" name="nomper" id="nomper" class="form-control" required value="<?php if($datOne) echo $datOne[0]['nomper']; ?> ">
                    </div>
                    <div class = "form-group col-md-4">
                        <label for="pagprin">Pagina Inicial</label>
                        <select name="pagprin" id="pagprin" class="form-select">
                            <?php
                                if($datpag){
                                    foreach ($datpag  as $dt) {
                            ?>
                                        <option value="<?=$dt['idpag'];?>"
                                            <?php
                                                if($datOne && $datOne[0]['pagprin']==$dt['idpag']) echo " selected ";
                                            ?>              
                                        >
                                            <?=$dt['nompag'];?>
                                        </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class = "form-group col-md-4" style="text-align: center;">
                        <br>
                        <input type="hidden" name="idper" id="idper" value="<?php if($datOne) echo $datOne[0]['idper']; ?> ">
                        <input type="hidden" name="opera" value="<?php if($datOne) echo "Actualizar"; else echo "Insertar"; ?>">
                        <input type="submit" class="btn btn-primary" value="<?php if($datOne) echo "Actualizar"; else echo "Registrar" ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table id="myt" class="table table-striped" style="width:100%;text-align: center;">
        <thead>
            <tr>
                <th class="barra" id="esquina1">Id</th>
                <th class="barra">Nombre</th>
                <th class="barra" id="esquina2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($dat){
                    foreach($dat AS $d){
            ?>
                    <tr>
                        <td><?=$d['idper'];?></td>
                        <td>
                            <?=$d['nomper'];?>
                            <br>
                            <small><?=$d['nompag'];?></small>
                        </td>
                        <td>
                            <i class="fa-solid fa-circle-exclamation fa-2x" data-bs-toggle="modal" data-bs-target="#myModal<?=$d['idper'];?>" title="Ver Páginas"></i>
                            <?php echo modal($d['idper'], $d['nomper'], $pg); ?>
                            <br><br>
                            <a href="home.php?pg=<?=$pg;?>&idper=<?=$d['idper'];?>" title="Actualizar">
                                <i class="fa-solid fa-pen-to-square fa-2x" style="color:black;text-decoration:none;"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="barra1" id="esquina3">Id</th>
                <th class="barra1">Nombre</th>
                <th class="barra1" id="esquina4"></th>
            </tr>
        </tfoot>
    </table>
</div>

