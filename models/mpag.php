<?php
class mpag{
    public function selAll(){
        $resultado = NULL;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="SELECT idpag, nompag, rutpag, mospag, ordpag, icopag FROM pagina";
        $result = $conexion->prepare($sql);
        $result->execute();
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
            return $resultado;
    }
    public function selOne($idpag){
        $resultado = NULL;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="SELECT idpag, nompag, rutpag, mospag, ordpag, icopag FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag", $idpag);
        $result->execute();
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
            return $resultado;
    }
    public function ins($nompag, $rutpag, $mospag, $ordpag, $icopag){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="INSERT INTO pagina(nompag, rutpag, mospag, ordpag, icopag) VALUES (:nompag, :rutpag, :mospag, :ordpag, :icopag)";
        $result = $conexion->prepare($sql);
        
        $result->bindParam(":nompag",$nompag);
        $result->bindParam(":rutpag",$rutpag);
        $result->bindParam(":mospag",$mospag);
        $result->bindParam(":ordpag",$ordpag);
        $result->bindParam(":icopag",$icopag);

        $result->execute();
    }   
    public function upd($idpag, $nompag, $rutpag, $mospag, $ordpag, $icopag){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="UPDATE pagina SET nompag=:nompag,rutpag=:rutpag,mospag=:mospag,ordpag=:ordpag,icopag=:icopag WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);

        $result->bindParam(":idpag", $idpag);
        $result->bindParam(":nompag",$nompag);
        $result->bindParam(":rutpag",$rutpag);
        $result->bindParam(":mospag",$mospag);
        $result->bindParam(":ordpag",$ordpag);
        $result->bindParam(":icopag",$icopag);

        $result->execute();
    }
    public function delePxP($idpag){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM `pagper` WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag",$idpag);
        $result->execute();
    }
    public function del($idpag){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();    
        $sql="DELETE FROM pagina WHERE  idpag=:idpag";
        $result = $conexion->prepare($sql);

        $result->bindParam(":idpag", $idpag);

        $result->execute();
    }       
    
}
?>