<?php
include("models/mval.php");

$mval= new Mval();

$idval=isset($_REQUEST['idval']) ? $_REQUEST['idval']:NULL;
$nomval=isset($_POST['nomval']) ? $_POST['nomval']:NULL;
$iddom=isset($_POST['iddom']) ? $_POST['iddom']:NULL;
$parval = isset($_POST['parval']) ? $_POST['parval'] : NULL;
$act=isset($_REQUEST['act']) ? $_REQUEST['act']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

//echo "<br>".$idval. "-" . $nomval . "-" . $iddom . "-" . $act . "-". $ope."<br>";
//die();

$pag = 1005;


// if($pg==1005){
//     $pg== $pg;
//     $idval= $_SESSION['idusu'];
// }

$mval->setIdval($idval);
if($ope=="save"){
    if ($idval) $val = $mval->getone();
    $mval->setNomval($nomval);
    $mval->setIddom($iddom);
    $mval->setParval($parval);
    $mval->setAct($act);
    if(!$idval)
        $mval->save();
    else
        $mval->edit();
}

if ($ope=="eli")
    $mval->del();

if ($ope == "edi" and $idval)
    $val = $mval->getOne();

if($idval && $act){
    $mval->setAct($act);
    $mval->editAct();
}

$datVal= $mval->getAll();
$datDom = $mval->getNdom();
$val = NULL;


?>