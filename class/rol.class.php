<?php
require_once('bd.class.php');
class Rol extends Database{
    var $id_rol;
    var $descr;

    public function getIdRol(){
		return $this->id_rol;
	}
	public function setIdRol($id_rol){
		$this->id_rol = $id_rol;
	}
	public function getDescr(){
		return $this->descr;
	}
	public function setDescr($descr){
		$this->descr = $descr;
    }
    public function leerRol(){
        $this->conectar();
        $datos = [];
        foreach ($this->conn->query("SELECT * FROM rol") as $resultado) {
            array_push($datos, $resultado);
        }
        $this->desconectar();
        return $datos;
    }
}
$nuevoRol = new Rol;
?>