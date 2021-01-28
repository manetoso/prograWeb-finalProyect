<?php
    require_once('bd.class.php');
    class Cat extends Database{
        var $id_cat;
        var $descr;

        public function getIdCat(){
            return $this->id_cat;
        }
        public function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }
        public function getDescr(){
            return $this->descr;
        }
        public function setDescr($descr){
            $this->descr = $descr;
        }
        public function leerCat(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM categoria") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
    }
    $nuevaCat = new Cat;
?>