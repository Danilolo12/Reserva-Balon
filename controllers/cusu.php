
<?php
include("models/musu.php");

$musu = new Musu();

$idusu = isset($_REQUEST['idusu']) ? $_REQUEST['idusu']:NULL;
$ndocusu = isset($_POST['ndocusu']) ? $_POST['ndocusu']:NULL;
$tdocusu = isset($_POST['tdocusu']) ? $_POST['tdocusu']:NULL;
$nomusu = isset($_POST['nomusu']) ? $_POST['nomusu']:NULL;
$apeusu = isset($_POST['apeusu']) ? $_POST['apeusu']:NULL;
$idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
$pasusu = isset($_POST['pasusu']) ? $_POST['pasusu']:NULL;
$emausu = isset($_POST['emausu']) ? $_POST['emausu']:NULL;
$actusu = isset($_REQUEST['actusu']) ? $_REQUEST['actusu']:NULL;
$fotusu = isset($_POST['fotusu']) ? $_POST['fotusu']:NULL;
$telusu = isset($_POST['telusu']) ? $_POST['telusu']:NULL;

$arc = isset($_FILES['fotcan']['name']) ? $_FILES['fotcan']['name']:NULL;
if($arc){
	$fotcan = opti($_FILES['fotcan'], $ndocusu, "img", "");
}

$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
//echo "<br>".$idusu."-".$ndocusu."-".$tdocusu."-".$noliccon."-".$catliccon."-".$fecvlic."-".$nomusu."-".$apeusu."-".$idper."-".$pasusu."-".$emausu."-".$actusu."-".$fotusu."-".$telusu."-".$ope."<br>";
$pag = 1007;
if ($pg==1007){
	$pag = $pg;
	$idusu = $_SESSION['idusu'];
	
}

$musu->setIdusu($idusu);
if($ope=="save"){
	if($idusu) $val = $musu->getone();
	$musu->setNdocusu($ndocusu);
	$musu->setTdocusu($tdocusu);
	$musu->setNomusu($nomusu);
	$musu->setApeusu($apeusu);
	$musu->setIdper(isset($idper) ? $idper:$val[0]["idper"]);
	$musu->setPasusu($pasusu);
	$musu->setEmausu($emausu);
	$musu->setActusu(isset($actusu) ? $actusu:$val[0]["actusu"]);
	$musu->setFotusu($fotusu);
	$musu->setTelusu($telusu);
	if(!$idusu)
		$musu->save();
	else
		$musu->edit();
}

if($ope=="eli")
	$musu->del();

if($idusu && $actusu){
	$musu->setActusu($actusu);
	$musu->editAct();
}

$datAll = $musu->getAll();
$datPer = $musu->getPerfil();
$musu->setIddom(2);
$datTdo = $musu->getTdoc();
$musu->setIddom(1);
$datCat = $musu->getTdoc();
$val = NULL;

if ($pg==1007){
	$ope = "edi";
}

if($ope=="edi" and $idusu)
	$val = $musu->getOne();

?>