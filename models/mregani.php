<?php
class mregani{

    
    private $idani;
	private $idusu;
    private $nomani;
	private $razani;
    private $fotani;

    private $iddom;
    function getidani(){
        return $this->idani;
    }
    function getidusu(){
        return $this->idusu;
    }
    function getnomani(){
        return $this->nomani;
    }
    function getRazani(){
        return $this->razani;
    }
    function getfotani(){
        return $this->fotani;
    }
    function getIddom(){
		return $this->iddom;
	}


    function setidani($idani){
        $this->idani = $idani;
    }
    function setidusu($idusu){
		$this->idusu = $idusu;
	}
    function setnomani($nomani){
        $this->nomani = $nomani;
    }
    function setrazani($razani){
        $this->razani = $razani;
    }
    function setfotani($fotani){
        $this->fotani = $fotani;
    }
    function setIddom($iddom){
		$this->iddom = $iddom;
	}
    
    
//Métodos CRUD
    function getAll(){
        $sql = "SELECT idani, idusu, nomani, razani, fotani FROM animal WHERE 1";
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
        $sql="SELECT a.idani, a.idusu, a.nomani, a.razani, a.fotani, v.nomval FROM animal AS a INNER JOIN valor AS v ON a.razani=v.idval WHERE 1";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $result = $conexion->prepare($sql);
        $idani = $this->getidani();
        $result->bindParam(":idani", $idani);
        $result->execute();
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
    
    function save(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="INSERT INTO animal(idusu, nomani, razani, fotani) VALUES (:idusu, :nomani, :razani, :fotani)";
        $result = $conexion->prepare($sql);
        $idusu=$this->getidusu();
        $result->bindParam(":idusu",$idusu);
        $nomani=$this->getnomani();
        $result->bindParam(":nomani",$nomani);
        $razani=$this->getrazani();
        $result->bindParam(":razani",$razani);
        $fotani=$this->getfotani();
        $result->bindParam(":fotani",$fotani);
        $result->execute();
		while($f=$result->fetch())
			$res[]=$f;
		return $res;

    }   
    function upd(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="UPDATE animal SET idusu=:idusu,nomani=:nomani,razani=:razani,fotani=:fotani WHERE idani=:idani";
        $result = $conexion->prepare($sql);
        $idani=$this->getidani();
        $result->bindParam(":idani",$idani);
        $idusu=$this->getidusu();
        $result->bindParam(":idusu",$idusu);
        $nomani=$this->getnomani();
        $result->bindParam(":nomani",$nomani);
        $razani=$this->getrazani();
        $result->bindParam(":razani",$razani);
        $fotani=$this->getfotani();
        $result->bindParam(":fotani",$fotani);
        $result->execute();
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
    }
    function eli(){
		$sql = "DELETE FROM animal WHERE idani=:idani";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idani = $this->getidani();
		$result->bindParam(':idani',$idani);
	
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function getRaza(){
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