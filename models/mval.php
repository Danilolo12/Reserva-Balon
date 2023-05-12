<?php

use LDAP\Result;

class Mval{
//Atributos
	private $idval;
    private $nomval;
    private $iddom; 
    private $nomdom;
    private $parval;
    private $act;

//Metdodos get

    function getIdval(){
        return $this->idval;
    }
    function getNomval(){
        return $this->nomval;
    }
    function getIddom(){
        return $this->iddom;
    }
    function getNomdom(){
        return $this->nomdom;
    }
    function getParval(){
        return $this->parval;
    }
    function getAct(){
        return $this->act;
    }

//Metdodos set

    function setIdval($idval){
        $this->idval=$idval;
    }
    function setNomval($nomval){
        $this->nomval=$nomval;
    }
    function setIddom($iddom){
        $this->iddom=$iddom;
    }
    function setNomdom($nomdom){
        $this->nomdom=$nomdom;
    }
    function setParval($parval){
        $this->parval=$parval;
    }
    function setAct($act){
        $this->act=$act;
    }

//Métodos CRUD
	function getAll(){
		$sql = "SELECT v.idval, v.nomval, v.iddom, d.nomdom, v.parval, v.act FROM valor AS v INNER JOIN dominio AS d ON v.iddom=d.iddom";
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
		$sql = "SELECT v.idval, v.nomval, v.iddom, d.nomdom, v.parval, v.act FROM valor AS v INNER JOIN dominio AS d ON v.iddom=d.iddom WHERE v.idval=:idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idval= $this->getIdval();
        $result->bindParam(':idval',$idval);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function save(){
		$sql = "INSERT INTO valor(nomval, iddom, parval, act) VALUES (:nomval, :iddom, :parval, :act)";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $nomval=$this->getNomval();
        $result->bindParam(':nomval',$nomval);
        $iddom=$this->getIddom();
        $result->bindParam(':iddom',$iddom);
        $parval=$this->getParval();
        $result->bindParam(':parval',$parval);
        $act=$this->getAct();
        $result->bindParam(':act',$act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function edit(){
		$sql = "UPDATE valor SET nomval=:nomval, iddom=:iddom, parval=:parval, act=:act WHERE idval=:idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idval = $this->getIdval();
        $result->bindParam(':idval', $idval);
        $nomval = $this->getNdom();
        $result->bindParam(':nomval', $nomval);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom', $iddom);
        $parval = $this->getParval();
        $result->bindParam(':parval', $parval);
        $act = $this->getAct();
        $result->bindParam(':act', $act);
		//echo $sql."<br>";
		//echo $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "<br>".$idusu."-".$ndocusu."-".$tdocusu."-".$noliccon."-".$catliccon."-".$fecvlic."-".$nomusu."-".$apeusu."-".$idper."-".$pasusu."-".$emausu."-".$actusu."-".$fotusu."-".$telusu."<br>";
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function editAct(){
		$sql = "UPDATE valor SET act=:act WHERE idval=:idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idval = $this->getIdval();
		$result->bindParam(':idval',$idval);
		$act=$this->getAct();
		$result->bindParam(':act',$act);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
	function del(){
		$sql = "DELETE FROM valor WHERE idval=:idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(':idval',$idval);
		//echo $sql."<br>";
		//echo $idusu."<br>";
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function getNdom(){
		$sql = "SELECT iddom, nomdom FROM dominio";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}
}
