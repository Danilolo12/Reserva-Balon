<?php require_once 'controllers/cpag.php';?>
<div class="header">
         <p>Pagina</p>
</div>
<br>
<div class="conte"> 
    <div class="inser">
        <form name="frm1" action="home.php?pg=<?=$pg;?>" method="POST">
            <div class="row align-items-center">
                <div class="form-group col-md-6 offset-md-3">
                        <label for="nompag">Nombre</label>
                        <input type="text" name="nompag" id="nompag" maxlength="70" class="form-control" required value="<?php if($datOne) echo $datOne[0]['nompag']; ?>">
                </div>

                <div class="form-group col-md-6 offset-md-3">
                        <label for="mospag">Mostrar</label>
                        <select name="mospag" id="mospag" class="form-select">
                            <option value="1"
                            <?php if($datOne && $datOne[0]['mospag']==1) echo " selected "; ?>>Mostrar</option>
                            <option value="2"
                            <?php if($datOne && $datOne[0]['mospag']==2) echo " selected "; ?>>No mostrar</option>
                        </select>
                </div>
                <div class="form-group col-md-6 offset-md-3">
                        <label for="ordpag">Ordenar</label>
                        <input type="number" name="ordpag" id="ordpag" class="form-control" required value="<?php if($datOne) echo $datOne[0]['ordpag']; ?>">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                        <label for="icopag">Icono</label>
                        <input type="text" name="icopag" id="icopag" class="form-control" value="<?php if($datOne) echo $datOne[0]['icopag']; ?>">
                </div>
                <div class="form-group col-md-6 offset-md-3">
                        <br>
                        <input type="submit" class="btn btn-secondary" value="<?php if($datOne) echo "Actualizar"; else echo "Registrar"; ?>">
                        <input type="hidden" name="idpag" value="<?php if($datOne) echo $datOne[0]['idpag']; ?>">
                        <input type="hidden" name="opera" value="<?php if($datOne) echo "Actualizar"; else echo "Insertar"; ?>"> 
                </div>
            </div>
        </form>
    </div>
    <br>
</div>
<div class="table">
        <div class="table_section">
            <table id="example" style="width:100%;" class="table">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">Icono</th>
                        <th scope="col">Página</th>
                        <th scope="col">Mostrar</th>
                        <th scope="col">Ordenar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                            if($dat){
                                foreach($dat AS $d){
                    ?>            
                        <tr>
                            <td class="ico_td"> <i class="<?=$d['icopag'];?> fa-2x"></i></td>
                            <td> <strong><?=$d['idpag'];?> - <?=$d['nompag'];?></strong><br>
                            <small><strong>Ruta: </strong><?=$d['rutpag'];?><br><strong>Ícono: </strong><?=$d['icopag'];?><br></small></td>
                            <td>
                                <?php if($d['mospag']==1){?>
                                    <i class="fa-solid fa-circle-check"></i>
                                <?php }else{ ?>
                                    <i class="fa-solid fa-circle-xmark" style="color:#f00;"></i>
                                <?php } ?>
                            </td>
                            <td><?=$d['ordpag'];?><br></td>
                            <td>
                                <a href="home.php?pg=<?=$pg;?>&idpag=<?=$d['idpag'];?>&opera=Eliminar" title="Eliminar" onclick="return eliminar();">
                                    <i class="fa-solid fa-trash-can fa-2x" style="color:black;text-decoration:none;"></i>
                                </a>
                                <br><br>
                                <a href="home.php?pg=<?=$pg;?>&idpag=<?=$d['idpag'];?>" title="Actualizar">
                                    <i class="fa-solid fa-pen-to-square fa-2x" style="color:black;text-decoration:none;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                                }
                            }
                    ?>        
                </tbody>
            </table>
        </div>
</div>
    <br><br><br><br>

