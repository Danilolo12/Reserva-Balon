<?php 
    class mper{
        public function selAll(){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT p.idper, p.nomper, p.pagprin, g.nompag FROM perfil AS p LEFT JOIN pagina AS g ON p.pagprin=g.idpag";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function selOne($idper){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT idper, nomper, pagprin FROM perfil WHERE idper=:idper";
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper",$idper);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function ins($nomper, $pagprin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO perfil(nomper, pagprin) VALUES (:nomper, :pagprin)";
            $result = $conexion->prepare($sql);

            $result->bindParam(":nomper",$nomper);
            $result->bindParam(":pagprin",$pagprin);

            $result->execute();
        }
        public function upd($idper,$nomper,$pagprin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "UPDATE perfil SET nomper=:nomper, pagprin=:pagprin WHERE idper=:idper";
            //echo $sql."<br>";
            //echo "'".$idper."','".$nomper."','".$pagprin."'";
            $result = $conexion->prepare($sql);

            $result->bindParam(":idper",$idper);
            $result->bindParam(":nomper",$nomper);
            $result->bindParam(":pagprin",$pagprin);

            $result->execute();
        }
        public function del($idper){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "DELETE FROM perfil WHERE idper=:idper";
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper",$idper);
            $result->execute();
        }
        public function selPag(){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT idpag, nompag, icopag FROM pagina";
            $result = $conexion->prepare($sql);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function selPxP($idper,$idpag){
            $resultado = NULL;
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT idpag FROM pagper WHERE idper=:idper AND idpag=:idpag";
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper",$idper);
            $result->bindParam(":idpag",$idpag);
            $result->execute();
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function delPXP($idper){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "DELETE FROM pagper WHERE idper=:idper";
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper",$idper);
            $result->execute();
        }
        public function insPxP($idper,$idpag){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO pagper (idpag,idper) VALUES (:idpag,:idper);";
            $result = $conexion->prepare($sql);
            $result->bindParam(":idper",$idper);
            $result->bindParam(":idpag",$idpag);
            $result->execute();
        }
    }
?>