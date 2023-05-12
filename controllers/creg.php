<?php
include("models/mmin.php");
date_default_timezone_set('America/Bogota');

$mcon = new Mcon();

$numcon = isset($_REQUEST['numcon']) ? $_REQUEST['numcon']:NULL;
$idusu = isset($_POST['idusu']) ? $_POST['idusu']:NULL;
$idani = isset($_POST['idani']) ? $_POST['idani']:NULL;
$tipoani = isset($_POST['tipoani']) ? $_POST['tipoani']:NULL;
$oricon = isset($_POST['oricon']) ? $_POST['oricon']:NULL;
$fechos = date('Y-m-d H:i:s');
$codubi = isset($_POST['codubi']) ? $_POST['codubi']:NULL;
$tipcon = isset($_POST['tipcon']) ? $_POST['tipcon']:NULL;
$hij = isset($_POST['hij']) ? $_POST['hij']:NULL;
$desmin = isset($_POST['desmin']) ? $_POST['desmin']:NULL;
$fechord = isset($_POST['fechord']) ? $_POST['fechord']:'0000-00-00 00:00:00';
$nomani = isset($_POST['nomani']) ? $_POST['nomani']:NULL;
$propie = isset($_POST['propie']) ? $_POST['propie']:NULL;

$ndocusu = isset($_REQUEST['ndocusu']) ? $_REQUEST['ndocusu']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$pag = 1001;

//echo $ope." ".$nummin." ".$placa." ".$orimin;

$mcon->setNdocusu($ndocusu);
if($ope=="save"){
	if($ndocusu) $val = $mcon->getUsuario();
	if($val){
		$mcon->setIdusu($val[0]['idusu']);
		$origen = $mcon->getOrigen();
		if(!$origen){
			$mcon->setTipoani($tipoani);
			$mcon->setOricon($oricon);
			$mcon->setFechos($fechos);
			$mcon->setDesmin($descon);
			$mcon->setFechord($fechord);
			$numcon = $mcon->save();
		}else{
			$numcon = $origen[0]['numcom'];
		}
	}else{
		echo '<script>alert("Este usuario no existe");window.location=\'home.php?pg='.$pag.'\';</script>';
	}
}

if($ope=="edi" && $numcon){
	$mcon->setNumcon($numcon);
	$mcon->setTipoani($tipoani);
	$mcon->setOricon($oricon);
	$mcon->editSal();
	echo '<script>alert("registro exitoso");</script>';
}

if($ope=="ediLl" && $numcon){
	$fechord = date('Y-m-d H:i:s');
	$mcon->setNumcon($numcon);
	$mcon->setDescon($descon);
	$mcon->setFechord($fechord);
	$mcon->editLle();
	echo '<script>alert("registro exitoso");</script>';
}

if($ope=="save" && $numcon){
	// echo "<br>".$nummin." - ".$val[0]['idusu']."<br>";
	$mcon->setNumcon($numcon);
	$datOne = $mcon->getOne();
	// var_dump($datOne);
	// echo "<br><br><br><br>";
}

$datAni=$mcon->getAnim();
$datUbi=$mcon->getUbicacion();

?>