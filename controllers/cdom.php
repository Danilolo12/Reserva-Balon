<?php 
include("models/mdom.php");

$mdom = new Mdom();

$iddom =isset($_REQUEST['iddom']) ? $_REQUEST['iddom']:NULL;
$nomdom=isset($_POST['nomdom']) ? $_POST['nomdom']:NULL;
$ope =isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

//echo "<br>".$iddom. "-" . $nomdom . "-" . $ope."<br>";
//die();
$pag = 1004;

$mdom->setIddom($iddom);
if($ope== "save"){
    if ($iddom) $val = $mdom->getone();
    $mdom->setNomdom($nomdom);
    if(!$iddom)
        $mdom->save();
    else
        $mdom->edit();
}

if ($ope == "eli")
    $mdom->del();

$datAll = $mdom->getAll();
$val=NULL;

if ($pg == 1004) {
    $ope = "edi";
}

if ($ope == "edi" and $iddom)
    $val = $mdom->getOne();
?>