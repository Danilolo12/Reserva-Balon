<?php
require_once('conexion.php');
$usu = isset($_POST['usu']) ? $_POST['usu']:NULL;
$pas = isset($_POST['pas']) ? $_POST['pas']:NULL;

if($usu AND $pas){
	validar($usu, $pas);
}else{
	reg();
}

function validar($usu, $pas){
	$res = ingr($usu, $pas);
	$res = isset($res) ? $res:NULL;

	if($res){
		//echo "le entra";
		session_start();
		$_SESSION['idusu'] = $res[0]["idusu"];
		$_SESSION['nomusu'] = $res[0]["nomusu"]." ".$res[0]["apeusu"];
		$_SESSION['idper'] = $res[0]["idper"];
		$_SESSION['nomper'] = $res[0]["nomper"];
		$_SESSION['aut'] = 'Gru/75%132¨ñ,.@';
		echo "<script>window.location='../home.php'</script>";
	}else{
		reg();
	}
}

function reg(){
	echo "<script>window.location='../index.php?error=ok'</script>";
}
function ingr($usu, $pas){
	// echo "<br>Contraseña Original: ".$pas; 
	$pas = sha1(md5("4rh(,@".$pas))."4rh(,@";
	$sql = "SELECT u.idusu, u.nomusu, u.apeusu, u.idper, p.nomper FROM usuario AS u INNER JOIN perfil AS p ON u.idper=p.idper WHERE u.actusu=1 AND concat(u.pasusu,'4rh(,@')=:pas AND u.emausu=:usu;";
	// $pas = sha1(md5($pas));
	// $sql = "SELECT u.idusu, u.nomusu, u.apeusu, u.idper, p.nomper FROM usuario AS u INNER JOIN perfil AS p ON u.idper=p.idper WHERE u.actusu=1 AND concat(u.pasusu)=:pas AND u.emausu=:usu;";
	// echo "<br>".$sql."<br>".$usu." ".$pas."<br>";
	$modelo = new conexion();
	$conexion = $modelo->get_conexion();
	$result = $conexion->prepare($sql);
	$result->bindParam(':usu',$usu);
	$result->bindParam(':pas',$pas);
	$result->execute();
	$res = NULL;
	while($f=$result->fetch())
		$res[]=$f;
	return $res;
}
?>