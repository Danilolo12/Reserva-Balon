<?php 
class Mdom{
private $iddom;
private $nomdom;

//metods get
function getIddom(){
    return $this->iddom;
}
function getNomdom(){
    return $this->nomdom;
}

//metods set
function setIddom($iddom){
    $this->iddom = $iddom;
}
function setNomdom($nomdom){
    $this->nomdom = $nomdom;
}


    function getAll(){
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
    function getOne(){
        $sql = "SELECT iddom, nomdom FROM dominio WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom',$iddom);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
    function save(){
        $sql= "INSERT INTO dominio(nomdom) VALUES (:nomdom)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
		$nomdom=$this->getNomdom();
		$result->bindParam(':nomdom',$nomdom);
        $result->execute();
        $res = NULL;
        while ($f = $result->fetch())
        $res[] = $f;
        return $res;
    }

    function edit(){
        $sql = "UPDATE dominio SET nomdom=:nomdom WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom', $iddom);
        $nomdom = $this->getNomdom();
        $result->bindParam(':nomdom', $nomdom);

        $result->execute();
        $res = NULL;
        while ($f = $result->fetch())
            $res[] = $f;
        return $res;
    }
    function del(){
        $sql = "DELETE FROM dominio WHERE iddom=:iddom";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddom = $this->getIddom();
        $result->bindParam(':iddom', $iddom);
        //echo $sql."<br>";
        //echo $idusu."<br>";
        $result->execute();
        $res = NULL;
        while ($f = $result->fetch())
            $res[] = $f;
        return $res;
    }
}
