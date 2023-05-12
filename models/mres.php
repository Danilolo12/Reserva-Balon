<?php
class Mres{

    private $idres;
    private $diares;
    private $fecini;
    private $fecend;
    private $actres;

    function getIdres(){
        return $this->idres;
    }
    function getDiares(){
        return $this->diares;
    }
    function getFecini(){
        return $this->fecini;
    }
    function getFecend(){
        return $this->fecend;
    }
    function getActres(){
        return $this->actres;
    }

    function setIdres($idres){
        $this->idres = $idres;
    }
    function setDiares($diares){
        $this->diares = $diares;
    }
    function setFecini($fecini){
        $this->fecini = $fecini;
    }
    function setFecend($fecend){
        $this->fecend = $fecend;
    }
    function setActres($actres){
        $this->actres = $actres;
    }

    public function getAll(){
        $resultado = NULL;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="SELECT idres, diares, fecini, fecend, actres FROM reservar";
        $result = $conexion->prepare($sql);
        $result->execute();
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
        return $resultado;
    }

    public function getOne(){
        $resultado = NULL;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="SELECT idres, actres, diares, fecini, fecend FROM reservar WHERE idres=:idres";
        $result = $conexion->prepare($sql);
        $idres = $this->getIdres();
        $result->bindParam(":idres", $idres);
        $result->execute();
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
            return $resultado;
    }

    public function save(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="INSERT INTO reservar(actres, diares, fecini, fecend) VALUES (:actres, :diares, :fecini, :fecend)";
        $result = $conexion->prepare($sql);
        $actres = $this->getActres();
        $result->bindParam(":actres",$actres);
        $diares = $this->getDiares();
        $result->bindParam(":diares",$diares);
        $fecini = $this->getFecini();
        $result->bindParam(":fecini",$fecini);
        $fecend = $this->getFecend();
        $result->bindParam(":fecend",$fecend);

        $result->execute();
    }  
    public function edit(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="UPDATE reservar SET actres=:actres,diares=:diares,fecini=:fecini,fecend=:fecend WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idres = $this->getIdres();
        $result->bindParam(":idres", $idres);
        $actres = $this->getActres();
        $result->bindParam(":actres",$actres);
        $diares = $this->getDiares();
        $result->bindParam(":diares",$diares);
        $fecini = $this->getFecini();
        $result->bindParam(":fecini",$fecini);
        $fecend = $this->getFecend();
        $result->bindParam(":fecend",$fecend);

        $result->execute();
    }

    public function editAct(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="UPDATE reservar SET actres=:actres WHERE idres=:idres";
        $result = $conexion->prepare($sql);
        $idres = $this->getIdres();
        $result->bindParam(":idres", $idres);
        $actres = $this->getActres();
        $result->bindParam(":actres",$actres);

        $result->execute();
    }

    function getUsu(){
		$sql = "SELECT u.idusu, u.ndocusu, u.tdocusu, u.nomusu, r.actres, u.apeusu, u.idper, u.emausu, u.actusu, u.fotusu, u.telusu FROM usuario AS u INNER JOIN reservar AS r ON u.tdocusu=r.idres WHERE u.idper";
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
?>