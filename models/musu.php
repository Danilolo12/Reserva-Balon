<?php
	class Musu{
		//Atributos 
			private $idusu;
			private $ndocusu;
			private $tdocusu;
			private $nomusu;
			private $apeusu;
			private $idper;
			private $pasusu;
			private $emausu;
			private $actusu;
			private $fotusu;
			private $telusu;

	private $iddom;
// Métodos Get devuelven datos
	function getIdusu(){
		return $this->idusu;
	}
	function getNdocusu(){
		return $this->ndocusu;
	}
	function getTdocusu(){
		return $this->tdocusu;
	}
	function getNomusu(){
		return $this->nomusu;
	}
	function getApeusu(){
		return $this->apeusu;
	}
	function getIdper(){
		return $this->idper;
	}
	function getPasusu(){
		return $this->pasusu;
	}
	function getEmausu(){
		return $this->emausu;
	}
	function getActusu(){
		return $this->actusu;
	}
	function getFotusu(){
		return $this->fotusu;
	}
	function getTelusu(){
		return $this->telusu;
	}

	
	function getIddom(){
		return $this->iddom;
	}

//Métodos Set guardan datos
	function setIdusu($idusu){
		$this->idusu = $idusu;
	}
	function setNdocusu($ndocusu){
		$this->ndocusu = $ndocusu;
	}
	function setTdocusu($tdocusu){
		$this->tdocusu = $tdocusu;
	}
	function setNomusu($nomusu){
		$this->nomusu = $nomusu;
	}
	function setApeusu($apeusu){
		$this->apeusu = $apeusu;
	}
	function setIdper($idper){
		$this->idper = $idper;
	}
	function setPasusu($pasusu){
		$this->pasusu = $pasusu;
	}
	function setEmausu($emausu){
		$this->emausu = $emausu;
	}
	function setActusu($actusu){
		$this->actusu = $actusu;
	}
	function setFotusu($fotusu){
		$this->fotcan = $fotusu;
	}
	function setTelusu($telusu){
		$this->telcan = $telusu;
	}



	function setIddom($iddom){
		$this->iddom = $iddom;
	}

//Métodos CRUD
	function getAll(){
		$sql = "SELECT u.idusu, u.tdocusu, v.nomval, u.ndocusu, u.nomusu, u.apeusu, u.idper, p.nomper, u.pasusu, u.emausu, u.actusu, u.fotusu, u.telusu FROM usuario AS u INNER JOIN perfil AS p ON u.idper=p.idper INNER JOIN valor AS v ON u.tdocusu=v.idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function getOne(){
		$sql = "SELECT u.idusu, u.tdocusu, v.nomval, u.ndocusu, u.nomusu, u.apeusu, u.idper, p.nomper, u.pasusu, u.emausu, u.actusu, u.fotusu, u.telusu FROM usuario AS u INNER JOIN perfil AS p ON u.idper=p.idper INNER JOIN valor AS v ON u.tdocusu=v.idval WHERE u.idusu=:idusu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$Idusu = $this->getIdusu();
		$result->bindParam(':idusu',$Idusu);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function save(){
		$sql = "INSERT INTO usuario(ndocusu, tdocusu, nomusu, apeusu, idper, pasusu, emausu, actusu, fotusu, telusu) VALUES (:ndocusu, :tdocusu, :nomusu, :apeusu, :idper, :pasusu, :emausu, :actusu, :fotusu, :telusu)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$ndocusu=$this->getNdocusu();
		$result->bindParam(':ndocusu',$ndocusu);
		$tdocusu=$this->getTdocusu();
		$result->bindParam(':tdocusu',$tdocusu);
		$nomusu=$this->getNomusu();
		$result->bindParam(':nomusu',$nomusu);
		$apeusu=$this->getApeusu();
		$result->bindParam(':apeusu',$apeusu);
		$idper=$this->getIdper();
		$result->bindParam(':idper',$idper);
		$pasusu=$this->getPasusu();
		$pas = sha1(md5("4rh(,@".$pasusu));
		$result->bindParam(':pasusu',$pas);
		$emausu=$this->getEmausu();
		$result->bindParam(':emausu',$emausu);
		$actusu=$this->getActusu();
		$result->bindParam(':actusu',$actusu);
		$fotcan=$this->getFotcan();
		$result->bindParam(':fotusu',$fotusu);
		$telcan=$this->getTelcan();
		$result->bindParam(':telusu',$telusu);
		$idcof=$this->getIdcof();
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function edit(){
		$sql = "UPDATE usuario SET ndocusu=:ndocusu, tdocusu=:tdocusu, nomusu=:nomusu, apeusu=:apeusu";
		$pasusu=$this->getPasusu();
		if($pasusu) $sql .= ", pasusu=:pasusu";
		$fotusu=$this->getFotusu();
		if($fotusu) $sql .= ", fotusu=:fotusu";
		$sql .= ", idper=:idper, emausu=:emausu, actusu=:actusu, telusu=:telusu";
		$sql .= " WHERE idusu=:idusu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idusu = $this->getIdusu();
		$result->bindParam(':idusu',$idusu);
		$ndocusu=$this->getNdocusu();
		$result->bindParam(':ndocusu',$ndocusu);
		$tdocusu=$this->getTdocusu();
		$result->bindParam(':tdocusu',$tdocusu);
		$nomusu=$this->getNomusu();
		$result->bindParam(':nomusu',$nomusu);
		$apeusu=$this->getApeusu();
		$result->bindParam(':apeusu',$apeusu);
		$idper=$this->getIdper();
		$result->bindParam(':idper',$idper);
		$pasusu=$this->getPasusu();
		if($pasusu){
			$pas = sha1(md5("4rh(,@".$pasusu));
			$result->bindParam(':pasusu',$pas);
		}
		$emausu=$this->getEmausu();
		$result->bindParam(':emausu',$emausu);
		$actusu=$this->getActusu();
		$result->bindParam(':actusu',$actusu);
		if($fotusu) $result->bindParam(':fotusu',$fotusu);
		$telusu=$this->getTelusu();
		$result->bindParam(':telusu',$telusu);
		// echo $sql."<br>";
		//echo $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "<br>".$idusu."-".$ndocusu."-".$tdocusu."-".$noliccon."-".$catliccon."-".$fecvlic."-".$nomusu."-".$apeusu."-".$idper."-".$pasusu."-".$emausu."-".$actusu."-".$fotusu."-".$telusu."<br>";
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function editAct(){
		$sql = "UPDATE usuario SET actusu=:actusu";
		$sql .= " WHERE idusu=:idusu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idusu = $this->getIdusu();
		$result->bindParam(':idusu',$idusu);
		$actusu=$this->getActusu();
		$result->bindParam(':actusu',$actusu);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function del(){
		$sql = "DELETE FROM usuario WHERE idusu=:idusu";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idusu = $this->getIdusu();
		$result->bindParam(':idusu',$idusu);
		//echo $sql."<br>";
		//echo $idusu."<br>";
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function getPerfil(){
		$sql = "SELECT idper, nomper FROM perfil";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function getTdoc(){
		$sql = "SELECT idval, nomval FROM valor WHERE iddom=:iddom";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$Iddom = $this->getIddom();
		$result->bindParam(':iddom',$Iddom);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

}
?>