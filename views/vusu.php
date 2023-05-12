<?php 
include "controllers/cusu.php";
require_once("controllers/optimg.php");
?>
 <div class="header">
         <p>Usuarios</p>
</div>
<br>

<div id="ocultar">
	<form class="m-tb-40" action="home.php?pg=<?= $pag; ?>" method="POST" enctype="multipart/form-data">
		<div class="row">
			<input type="hidden" class="form-control form-control-sm" id="idusu" name="idusu" value="<?= isset($val) ? $val[0]['idusu'] : ''; ?>" />
			<div class="form-group col-md-4" id="go1">
				<label for="ndocusu">No. Documento</label>
				<input type="number" class="form-control form-control-sm" id="ndocusu" name="ndocusu" value="<?= isset($val) ? $val[0]['ndocusu'] : ''; ?>" required />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="tdocusu">Tipo de Documento</label>
				<select class="form-select" style="height: 34px;" id="tdocusu" name="tdocusu">


					<?php if ($datTdo) {
						foreach ($datTdo as $dtp) {
					?>
							<option value="<?= $dtp['idval']; ?>" <?php if ($val && $val[0]['tdocusu'] == $dtp['idval']) echo ' selected '; ?>>
								<?= $dtp['nomval']; ?>
							</option>
					<?php }
					} ?>

					
				</select>
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="nomusu">Nombre</label>
				<input type="text" class="form-control form-control-sm" id="nomusu" name="nomusu" value="<?= isset($val) ? $val[0]['nomusu'] : ''; ?>" required />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="apeusu">Apellido</label>
				<input type="text" class="form-control form-control-sm" id="apeusu" name="apeusu" value="<?= isset($val) ? $val[0]['apeusu'] : ''; ?>" required />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="pasusu">Contraseña</label>
				<input type="password" class="form-control form-control-sm" id="pasusu" name="pasusu" <?php if (!$val) echo 'required'; ?> />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="idper">Perfil</label>
				<select class="form-select" style="height: 34px;" id="idper" name="idper">
					<?php if ($datPer) {
						foreach ($datPer as $dtp) {
					?>
							<option value="<?= $dtp['idper']; ?>" <?php if ($val && $val[0]['idper'] == $dtp['idper']) echo ' selected '; ?>>
								<?= $dtp['nomper']; ?>
							</option>
					<?php }
					} ?>
				</select>
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="emausu">E-mail</label>
				<input type="email" class="form-control form-control-sm" id="emausu" name="emausu" value="<?= isset($val) ? $val[0]['emausu'] : ''; ?>" required />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="actusu">Activo</label>
				<select class="form-select" style="height: 34px;" id="actusu" name="actusu">
					<option value="1" <?php if ($val && $val[0]['actusu'] == 1) echo ' selected '; ?>>Si</option>
					<option value="2" <?php if ($val && $val[0]['actusu'] == 2) echo ' selected '; ?>>No</option>
				</select>
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="fotusu">Foto</label>
				<input type="file" class="form-control form-control-sm" id="fotusu" name="fotusu" value="<?= isset($val) ? $val[0]['fotusu'] : ''; ?>" />
			</div>
			<div class="form-group col-md-4" id="go1">
				<label for="telusu">Teléfono</label>
				<input type="number" class="form-control form-control-sm" id="telusu" name="telusu" value="<?= isset($val) ? $val[0]['telusu'] : ''; ?>" />
			</div>
			<div class="form-group col-md-4" id="go1" style="text-align: center;">
				<br>
				<input style="background-color:black;text-decoration:none;" type="submit" class="btn btn-primary" value="Registrar" />
				<input type="hidden" name="ope" value="save" />
			</div>
		</div>
	</form>
	<br>
</div>

<table id="myt" class="table table-striped" style="width:100%;">
	<thead>
		<tr>
			<th class="barra">Usuario
			</th>
			<th class="barra"></th>
					
		</tr>
	</thead>
	<tbody>
		<?php
		if ($datAll) {
			foreach ($datAll as $dtA) {
		?>
				<tr>
					<td>
						<div class="txtfot1">
							<?php if ($dtA['fotusu']) { ?>
								<img src="<?= $dtA['fotusu']; ?>" class="foto">
							<?php } else { ?>
								<i class="fa fa-solid fa-user fa-3x"></i>
							<?php } ?>
						</div>
						<div class="txtfot2">
							<strong>
								<?= $dtA['ndocusu'] . " - " . $dtA['nomusu'] . " " . $dtA['apeusu']; ?>
							</strong>
							<small>
								<br>
								<strong>E-mail:</strong> <?= $dtA['emausu']; ?>
								<?php if ($dtA['telusu']) { ?>
									<strong>Teléfono:</strong> <?= $dtA['telusu']; ?>
								<?php } ?>
							</small>
							<br><br><strong>Perfil:</strong> <?= $dtA['nomper']; ?>
						</div>
					</td>
					<td style="text-align:center;">
						<span style="opacity: 0;">
							<?= $dtA['actusu']; ?><br>
						</span>
						<?php if ($dtA['actusu'] == 1) { ?>
							<a href="home.php?pg=<?= $pag; ?>&actusu=2&idusu=<?= $dtA['idusu']; ?>" class="faok">
								<i class="fa-solid fa-circle-check fa-2x" style="margin: 5px;color: #00f;"></i>
							</a>
						<?php } else { ?>
							<a href="home.php?pg=<?= $pag; ?>&actusu=1&idusu=<?= $dtA['idusu']; ?>" class="faok">
								<i class="fa-solid fa-circle-xmark fa-2x" style="margin: 5px;color: #f00;"></i>
							</a>
						<?php } ?>
						<a href="home.php?pg=<?= $pag; ?>&ope=edi&idusu=<?= $dtA['idusu']; ?>" class="faok">
							<i class="fa-solid fa-pen-to-square fa-2x" title="Editar" style="color:black;text-decoration:none;margin: 5px;"></i>
						</a>
						<a href="home.php?pg=<?= $pag; ?>&ope=eli&idusu=<?= $dtA['idusu']; ?>" class="faok" onclick="">
							<i class="fa-solid fa-trash fa-2x" title="Eliminar" style="color:black;text-decoration:none;margin: 5px;"></i>
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
			<th class="barra">Usuario</th>
			<th class="barra"></th>
		</tr>
	</tfoot>
</table>