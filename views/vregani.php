<?php require_once 'controllers/cregani.php';?>
<div class="conte">
    <div class="inser">
        <form name="frm1" action="home.php?pg=<?=$pg;?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="idani" id="idani" value="<?= isset($val) ? $val[0]['idani'] : ''; ?>">
                <div class="form-group col-md-6">
                        <label for="nomani">Nombre</label>
                        <input type="text" name="nomani" id="nomani" class="form-control" required value="<?= isset($val) ? $val[0]['nomani'] : ''; ?>">
                </div>
                <div class="form-group col-md-6" id="go1">
							<option value="">
							</option>
				</select>
			</div>
                <div class="form-group col-md-6">
				    <label for="fotani">Foto</label>
				    <input type="file" class="form-control" id="fotani" name="fotani" value="<?=isset($val) ? $val[0]['fotani'] : ''; ?>" />
			    </div>
                
    
                <div class="form-group col-md-6" id="go1" style="text-align: center;">
				    <br>
                    <input type="submit" class="btn btn-primary" value="Insertar"; >
                    <input type="hidden" name="opera" value="save"; >
			    </div>
            </div>
        </form>
    </div>
    <br>
</div>
        
<table id="myt" class="table table-striped" style="width:100%;text-align: center;">
        <thead>
            <tr>
                
                <th class="barra" >Nombre</th>
                <th class="barra">Foto </th>
                <th class="barra" id="esquina2"></th>
            </tr>
        </thead>
            <tbody>
                    <?php 
                        if($dat){
                            foreach($dat AS $d){
                    ?>
                        <tr>
                            <td><?=$d['nomani'];?></td>
                            <td class="tdvlug">
                        <div class="txtfot1">
							<?php if ($d['fotani']) { ?>
								<img src="<?= $d['fotani']; ?>" class="foto" style="width: 200px;">
							<?php } else { ?>
								<i class="fa-solid fa-image fa-6x"></i>
							<?php } ?>
						</div>
                    </td>
                            <td>
                            <a href="home.php?pg=<?= $pg; ?>&opera=eli&idani=<?= $d['idani']; ?>" class="faok">
                            <i class="fa-solid fa-trash-can fa-2x" title="Eliminar"></i>
                            </a>


                            <a href="home.php?pg=1110&idani=<?= $d['idani']; ?>" title="Consultar">
                                <i class="fa-solid fa-pen-to-square fa-2x"></i>
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
            <th class="barra" >Nombre</th>
                <th class="barra">Foto</th>
                <th class="barra" id="esquina2"></th>
            </tr>
        </tfoot>
    </table>
    <br><br><br><br>
