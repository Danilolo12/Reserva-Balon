<?php
    require_once 'models/conexion.php';
    require_once 'models/mregani.php';

    $mregani = new mregani();

    $idani = isset($_REQUEST['idani']) ? $_REQUEST['idani']:NULL;
    $idusu = $_SESSION['idusu'];
    $nomani = isset($_POST['nomani']) ? $_POST['nomani']:NULL;
    $razani = isset($_POST['razani']) ? $_POST['razani']:NULL;
    $fotani = isset($_POST['fotani']) ? $_POST['fotani']:NULL;
    $arc = isset($_FILES['fotani']['name']) ? $_FILES['fotani']['name']:NULL;
    if($arc){
        $fotani = opti($_FILES['fotani'], $idani, "img", "");
    }

    $opera = isset($_REQUEST['opera']) ? $_REQUEST['opera']:NULL;
    
    $pg = 1020;

    $mregani->setidani($idani);
    if($opera=="save"){
        $mregani->setidusu($idusu);
        $mregani->setnomani($nomani);
        $mregani->setrazani($razani);
        $mregani->setfotani($fotani);
        if(!$idani)
            $mregani->save();
        else
            $mregani->upd();
    }


    if($opera=="eli") 
       $mregani->eli();

    $mregani->setIddom(3);
    $datRaz = $mregani->getRaza();

    if($opera=="upd" and $idani)
        $val = $mregani->getOne();

    $dat = $mregani->getAll();
    $val=null;

?>