<?php
require_once("controllers/cdom.php");
?>
<div class="header">
         <p>Dominio</p>
</div>
<br>
<div id="ocultar">
    <form class="m-tb-40" action="home.php?pg=<?= $pag; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
        <br><br>
            <input type="hidden" class="form-control form-control-sm" id="iddom" name="iddom" value="<?= isset($val) ? $val[0]['iddom'] : ''; ?>" />
            <div class="form-group col-md-6" id="go1">
                <label for="ndocusu">Nombre De Dominio</label>
                <input type="text" class="form-control form-control-sm" id="nomdom" name="nomdom" value="<?= isset($val) ? $val[0]['nomdom'] : ''; ?>" required />
            </div>

            <div class="form-group col-md-6" id="go1" style="text-align: center;">
            <br>
                <input type="submit" class="btn btn-primary" value="Registrar" />
                <input type="hidden" name="ope" value="save" />
            </div>
        </div>
    </form>
    <br><br>
</div>


<table id="myt" class="table table-striped" style="width:100%;text-align: center;">
    <thead>
        <tr>
            <th class="barra">ID</th>
            <th class="barra">Nombre</th>
            <th class="barra"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($datAll) {
            foreach ($datAll as $dtp) {
        ?>
                <tr>
                    <td>
                        <?= $dtp['iddom']; ?>
                    </td>
                    <td>
                        <?= $dtp['nomdom']; ?>
                    </td>
                    <td>
                        <a href="home.php?pg=<?= $pag; ?>&iddom=<?= $dtp['iddom']; ?>&ope=edi" class="faok">
                            <i class="fa-solid fa-pen-to-square fa-2x" tittle="Editar" style="color:black;text-decoration:none;"></i>
                        </a>
                        <a href="home.php?pg=<?= $pag; ?>&ope=eli&iddom=<?= $dtp['iddom']; ?>" class="faok">
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
            <th class="barra"></th>
        </tr>
    </tfoot>
</table>