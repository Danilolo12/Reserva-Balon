<?php
include "controllers/cval.php";
?>
<div class="header">
         <p>Valor</p>
</div>
<br>

<div id="ocultar">
    <form class="m-tb-40" action="home.php?pg=<?= $pag; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" class="form-control form-control-sm" id="idval" name="idval" value="<?= isset($val) ? $val[0]['idval'] : ''; ?>" />

            <div class="form-group col-md-4" id="go1">
                <label for="ndocusu">Nombre Del Valor</label>
                <input type="text" class="form-control form-control-sm" id="nomval" name="nomval" value="<?= isset($val) ? $val[0]['nomval'] : ''; ?>" required />
            </div>
            <div class="form-group col-md-4" id="go1">
                <label for="idper">Nombre del Dominio</label>
                <select class="form-select" style="height: 34px;" id="iddom" name="iddom">
                    <option value="0">Seleccione </option>
                    <?php if ($datDom){
                        foreach ($datDom as $dtp) {
                    ?>
                            <option value="<?= $dtp['iddom']; ?>" <?php if ($val && $val[0]['iddom'] == $dtp['iddom']) echo ' selected '; ?>>
                                <?= $dtp['nomdom']; ?>
                            </option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group col-md-4" id="go1">
                <label for="ndocusu">Parametros</label>
                <input type="text" class="form-control form-control-sm" id="parval" name="parval" value="<?= isset($val) ? $val[0]['parval'] : ''; ?>" required />
            </div>
            <div class="form-group col-md-4" id="go1">
                <label for="actusu">Activo</label>
                <select class="form-select" style="height: 34px;" id="act" name="act">
                    <option value="1" <?php if ($val && $val[0]['act'] == 1) echo ' selected '; ?>>Si</option>
                    <option value="2" <?php if ($val && $val[0]['act'] == 2) echo ' selected '; ?>>No</option>
                </select>
            </div>

            <div class="form-group col-md-4" id="go1" style="text-align: center;">
                <br>
                <input type="submit" class="btn btn-primary" value="Registrar" />
                <input type="hidden" name="ope" value="save" />
            </div>
        </div>
    </form>
    <br>
</div>


<table id="myt" class="table table-striped" style="width:100%;text-align: center;">
    <thead>
        <tr>
            <th class="barra">ID</th>
            <th class="barra">Nombre</th>
            <th class="barra">Nombre del Dominio</th>
            <th class="barra"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($datVal) {
            foreach ($datVal as $dtp) {
        ?>
                <tr>
                    <td>
                        <?= $dtp['idval']; ?>
                    </td>
                    <td>
                        <?= $dtp['nomval']; ?>
                    </td>
                    <td>
                        <?= $dtp['nomdom']; ?>
                    </td>
                    <td>
                        <span style="opacity: 0;">
                            <?= $dtp['act']; ?><br>
                        </span>
                        <?php if ($dtp['act'] == 1) { ?>
                            <a href="home.php?pg=<?= $pag; ?>&act=2&idval=<?= $dtp['idval']; ?>" class="faok">
                                <i class="fa-solid fa-circle-check fa-2x" style="margin: 5px;color: #2b8720;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="home.php?pg=<?= $pag; ?>&act=1&idval=<?= $dtp['idval']; ?>" class="faok">
                                <i class="fa-solid fa-circle-xmark fa-2x" style="margin: 5px;color: #f00;"></i>
                            </a>
                        <?php } ?>
                        <a href="home.php?pg=<?= $pag; ?>&idval=<?= $dtp['idval']; ?>&ope=edi" class="faok">
                            <i class="fa-solid fa-pen-to-square fa-2x" tittle="Editar" style="color:black;text-decoration:none;"></i>
                        </a>
                        <a href="home.php?pg=<?= $pag; ?>&ope=eli&idval=<?= $dtp['idval']; ?>" class="faok">
                            <i class="fa-solid fa-trash-can fa-2x" title="Eliminar" style="color:black;text-decoration:none;"></i>
                        </a>
                    </td>
            <?php
            }
        }
            ?>
                </tr>
    </tbody>
    <tfoot>
        <tr>
            <th class="barra">ID</th>
            <th class="barra">Nombre</th>
            <th class="barra">Nombre del Dominio</th>
            <th class="barra"></th>
        </tr>
    </tfoot>
</table>