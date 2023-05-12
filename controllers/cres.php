<?php
require_once 'models/mres.php';

$mres = new Mres();

$idres = isset($_REQUEST['idres']) ? $_REQUEST['idres']:NULL;
$diares = isset($_POST['diares']) ? $_POST['diares']:NULL;
$fecini = isset($_POST['fecini']) ? $_POST['fecini']:NULL;
$fecend = isset($_POST['fecend']) ? $_POST['fecend']:NULL;
$actres = isset($_REQUEST['actres']) ? $_REQUEST['actres']:NULL;

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$pag = 1008;

$mres->setIdres($idres);

if($idres && $actres){
    $mres->setActres($actres);
    $mres->editAct();
}

$datUsu = $mres->getUsu();
$dat = $mres->getAll();
$datOne = NULL;
if($idres)
    $datOne = $mres->getOne();

$val=NULL;
?>