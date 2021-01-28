<?php
    require_once('bd.class.php');
    class Presentacion extends Database{
        var $id_pre;
        var $descr;
        public function getIdPre(){
            return $this->id_pre;
        }
        public function setIdPre($id_pre){
            $this->id_pre = $id_pre;
        }
        public function getDescr(){
            return $this->descr;
        }
        public function setDescr($descr){
            $this->descr = $descr;
        }
        function crearPre(){
            $this->conectar();
            $sql = 'INSERT INTO presentacion(descr) VALUES (?)';
            if ($query = $this->conn->prepare($sql)){
                $descr = $this->getDescr();
                $query->bindParam(1,$descr);
                $query->execute();
            }
            $this->desconectar();
        }
        function modiPre(){
            $this->conectar();
            $sql = 'UPDATE presentacion SET descr=? WHERE id_pre=?';
            if ($query = $this->conn->prepare($sql)){
                $id = $this->getIdPre();
                $descr = $this->getDescr();
                $query->bindParam(1,$descr);
                $query->bindParam(2,$id);
                $query->execute();
            }
            $this->desconectar();
        }
        function borrarPre(){
            $this->conectar();
            $sql = 'DELETE FROM presentacion WHERE id_pre=?';
            if ($query = $this->conn->prepare($sql)){
                $id = $this->getIdPre();
                $query->bindParam(1,$id);
                $query->execute();
            }
            $this->desconectar();
        }
        function leerPre(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM presentacion") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        function leerUnaPre(){
            $this->conectar();
            if ($query = $this->conn->prepare('SELECT * FROM presentacion WHERE id_pre=?')){
                $id = $this->getIdPre();
                $query->bindParam(1, $id);
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
    }
    $newPre = new Presentacion;
?>