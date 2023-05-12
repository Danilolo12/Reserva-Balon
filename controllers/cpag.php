<?php
    require_once 'models/conexion.php';
    require_once 'models/mpag.php';

    $mpag = new mpag();

    $idpag = isset($_REQUEST['idpag']) ? $_REQUEST['idpag']:NULL;
    $nompag = isset($_POST['nompag']) ? $_POST['nompag']:NULL;
    $rutpag = isset($_POST['rutpag']) ? $_POST['rutpag']:NULL;
    $mospag = isset($_POST['mospag']) ? $_POST['mospag']:NULL;
    $ordpag = isset($_POST['ordpag']) ? $_POST['ordpag']:NULL;
    $icopag = isset($_POST['icopag']) ? $_POST['icopag']:NULL;
    $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;
    $pg = 1002;
    $datOne = NULL;

    if($opera=="Insertar"){
        if($nompag AND $rutpag AND $mospag AND $ordpag){
            $mpag->ins($nompag, $rutpag, $mospag, $ordpag, $icopag);
        }
    }

 if($opera=="Actualizar"){
    if($idpag AND $nompag AND $mospag AND $ordpag){
        $mpag->upd($idpag, $nompag, $rutpag, $mospag, $ordpag, $icopag);
    }
    $idpag="";
}

if($opera=="Eliminar"){
    if($idpag){
        $mpag->delePxP($idpag);
        $mpag->del($idpag);
    }
    
}   
$dat = $mpag->selAll();
if($idpag){
    $datOne = $mpag->selOne($idpag);
    }
?>

