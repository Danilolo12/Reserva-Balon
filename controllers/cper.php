<?php 
    require_once 'models/conexion.php';
    require_once 'models/mper.php';
    $mper = new mper();

    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $pagprin = isset($_POST['pagprin']) ? $_POST['pagprin']:NULL;
    $pagi = isset($_POST['pagi']) ? $_POST['pagi']:NULL;
    $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;

    $pg=1003;

//echo $idper ."-". $nomper ."-". $pagprin ."-". $idpag ."-".$opera;

    //Insertar
    if($opera=="Insertar"){
        if($nomper && $pagprin){
            $mper->ins($nomper, $pagprin);
        }
    }
//Insertar PXP
    if($opera=="InsPxP"){
        if($idper && $pagi){
            $mper->delPXP($idper);
            for($i=0;$i<count($pagi);$i++){
                $mper->insPxP($idper,$pagi[$i]);
            }
        }
        $idper="";
    }
//Actualizar
    if($opera=="Actualizar"){
        if($idper && $nomper && $pagprin){
            $mper->upd($idper,$nomper,$pagprin);
        }
        $idper="";
    }
//Eliminar
    if($opera=="Eliminar"){
        if($idper){
            $mper->del($idper);
        }
        $idper="";
    }
//Eliminar PXP
    if($opera=="EliPxP"){
        if($idper){
            $mper->delPXP($idper);
        }
    }

//mostrar todos los datos
    $dat = $mper->selAll();
    $datpag = $mper->selPag();
    //$datpxp = $mper->selPxP($idper);
    $datOne = NUll;
    if($idper){
        $datOne = $mper->selOne($idper);
    }

function modal($idper, $nomper, $pg){
    $mper = new mper();
    $datpag = $mper->selPag();
    $html = '';

    $html .= '<div class="modal" id="myModal'.$idper.'" tabindex="-1" role="dialog">';
        $html .= '<div class="modal-dialog">';
            $html .= '<div class="modal-content">';
                $html .= '<form name="frm3" action="home.php?pg='.$pg.'" method="POST">';
                    $html .= '<div class="modal-header">';
                        $html .= '<h3 class="modal-title">Páginas</h3>';
                        $html .= '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    $html .= '</div>';
                    
                        $html .= '<div class="modal-body">';
                            $html .= '<h5>Perfil: '.$nomper.'</h5>';
                            if($datpag){
                                foreach ($datpag  as $dt) {
                                    $dtpxp = $mper->selPxP($idper,$dt['idpag']);
                                    $html .= '<div class="dpag">';
                                        $html .= '<input type="checkbox" name="pagi[]" value="'.$dt['idpag'].'"';
                                        if($dtpxp) $html .= " checked ";
                                        $html .= '>';
                                            $html .= "&nbsp;&nbsp;&nbsp;".$dt['nompag'];
                                    $html .= '</div>';
                                }
                            }
                        $html .= '<input type="hidden" name="opera" value="InsPxP">';
                        $html .= '<input type="hidden" name="idper" value="'.$idper.'">';
                        $html .= '</div>';
                    $html .= '<div class="modal-footer">';
                        $html .= '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>';
                        $html .= '<input type="submit" class="btn btn-primary" value="Guardar">';
                    $html .= '</div>';
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';
    return $html;
}
    
?>