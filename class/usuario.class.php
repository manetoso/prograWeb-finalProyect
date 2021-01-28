<?php
require_once('bd.class.php');
    class Usuario extends Database{
        var $id_usr;
        var $usr;
        var $con;
        var $id_rol;
        // GETTER Y SETTER
        public function getId_usr(){
            return $this->id_usr;
        }
        public function setId_usr($id_usr){
            $this->id_usr = $id_usr;
        }
        public function getUsr(){
            return $this->usr;
        }
        public function setUsr($usr){
            $this->usr = $usr;
        }
        public function getCon(){
            return $this->con;
        }
        public function setCon($con){
            $this->con = $con;
        }
        public function getId_rol(){
            return $this->id_rol;
        }
        public function setId_rol($id_rol){
            $this->id_rol = $id_rol;
        }
        public function validarUsr(){
            $this->conectar();
            if($query = $this->conn->prepare("SELECT * FROM usuario WHERE usr = ?")){
                $usr = $this->getUsr();
                $con = $this->getCon();
                $query->bindParam(1, $usr);
                $query->execute();
                $resultado = $query->fetchAll();
                if(empty($resultado)){
                    return false;
                } else {
                    if (password_verify($con, $resultado[0]['con'])){
                        return $resultado[0];
                    }else{
                        return false;
                    }
                }
            }
            $this->desconectar();
        }
        public function crearUsr(){
            $this->conectar();
            if($query = $this->conn->prepare("INSERT INTO usuario(usr, con, id_rol) VALUES (?,?,?)")){
                $usr = $this->getUsr();
                $con = $this->getCon();
                $hash = password_hash($con, PASSWORD_DEFAULT, ['cost' => 10]);
                $id_rol = $this->getId_rol();
                $query->bindParam(1, $usr);
                $query->bindParam(2, $hash);
                $query->bindParam(3, $id_rol);
                $query->execute();
            }
            $this->desconectar();
        }
        public function modiUsr(){
            $this->conectar();
            if ($query = $this->conn->prepare('UPDATE usuario SET usr=?, con=?, id_rol=? WHERE id_usr=?')){
                $id_u = $this->getId_usr();
                $usr = $this->getUsr();
                $con = $this->getCon();
                $hash = password_hash($con, PASSWORD_DEFAULT, ['cost' => 10]);
                $id_r = $this->getId_rol();
                $query->bindParam(1, $usr);
                $query->bindParam(2, $hash);
                $query->bindParam(3, $id_r);
                $query->bindParam(4, $id_u);
                $query->execute();
            }
            $this->desconectar();
        }
        public function borrarUsr(){
            $this->conectar();
            if ($query = $this->conn->prepare('DELETE FROM usuario WHERE id_usr =?')){
                $id = $this->getId_usr();
                $query->bindParam(1, $id);
                $query->execute();
            }
            $this->desconectar();
        }
        public function leerUsr(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM usuario") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerUnUsr(){
            $this->conectar();
            if ($query = $this->conn->prepare('SELECT * FROM usuario WHERE id_usr=?')){
                $id = $this->getId_usr();
                $query->bindParam(1, $id);
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
    }
    $usuario = new Usuario;
?>