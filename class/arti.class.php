<?php
    require_once('bd.class.php');
    class Articulo extends Database{
        var $id_artic;
        var $tit;
        var $cont;
        var $fecha;
        var $foto;
        var $id_usr;

        public function getIdArtic(){
            return $this->id_artic;
        }
        public function setIdArtic($id_artic){
            $this->id_artic = $id_artic;
        }
        public function getTit(){
            return $this->tit;
        }
        public function setTit($tit){
            $this->tit = $tit;
        }
        public function getCont(){
            return $this->cont;
        }
        public function setCont($cont){
            $this->cont = $cont;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getFoto(){
            return $this->foto;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }
        public function getIdUsr(){
            return $this->id_usr;
        }
        public function setIdUsr($id_usr){
            $this->id_usr = $id_usr;
        }
        public function crearArtic(){
            $this->conectar();
            $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
            if (file_exists($_FILES['foto']['name'])){
                if (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/artic/'.$_FILES['foto']['name'])){
                    if($query = $this->conn->prepare("INSERT INTO articulos(tit, cont, fecha, foto, id_usr) VALUES (?,?,?,?,?)")){
                        $tit = $this->getTit();
                        $cont = $this->getCont();
                        $fecha = $this->getFecha();
                        $id_usr = $this->getIdUsr();
                        $query->bindParam(1, $tit);
                        $query->bindParam(2, $cont);
                        $query->bindParam(3, $fecha);
                        $query->bindParam(4, $tit.$_FILES['foto']['name']);
                        $query->bindParam(5, $id_usr);
                        $query->execute();
                    }
                }
            } elseif (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/artic/'.$_FILES['foto']['name'])){
                if ($query = $this->conn->prepare("INSERT INTO articulos(tit, cont, fecha, foto, id_usr) VALUES (?,?,?,?,?)")){
                    $tit = $this->getTit();
                    $cont = $this->getCont();
                    $fecha = $this->getFecha();
                    $id_usr = $this->getIdUsr();
                    $query->bindParam(1, $tit);
                    $query->bindParam(2, $cont);
                    $query->bindParam(3, $fecha);
                    $query->bindParam(4, $_FILES['foto']['name']);
                    $query->bindParam(5, $id_usr);
                    $query->execute();
                }
            }
            $this->desconectar();
        }
        public function crearJSON(){
            $this->setTit($_POST['tit']);
            $this->setCont($_POST['cont']);
            $this->setFecha($_POST['fecha']);
            $this->setIdUsr($_POST['id_usr']);
            $this->setFoto($_FILES['foto']);
            $this->crearArtic();
            $datos = [];
            $datos['msg'] = 'El Artículo ha sido creado correctamente';
            $datos['tit'] = $_POST['tit'];
            $datos['cont'] = $_POST['cont'];
            $datos['fecha'] = $_POST['fecha'];
            $datos['id_usr'] = $_POST['id_usr'];
            $datos['foto'] = $_FILES['foto']['name'];
            header('Content-Type: application/json');
            print_r(json_encode($datos));
        }
        public function modiArtic(){
            $this->conectar();
            if ($_FILES['foto']['name']){
                $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
                if (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/artic/'.$_FILES['foto']['name'])){
                    if ($query = $this->conn->prepare('UPDATE articulos SET tit=?, cont=?, fecha=?, foto=?, id_usr=? WHERE id_artic=?')){
                        $id_artic = $this->getIdArtic();
                        $tit = $this->getTit();
                        $cont = $this->getCont();
                        $fecha = $this->getFecha();
                        $id_usr = $this->getIdUsr();
                        $query->bindParam(1, $tit);
                        $query->bindParam(2, $cont);
                        $query->bindParam(3, $fecha);
                        $query->bindParam(4, $_FILES['foto']['name']);
                        $query->bindParam(5, $id_usr);
                        $query->bindParam(6, $id_artic);
                        $query->execute();
                    }
                }
            } else {
                if ($query = $this->conn->prepare('UPDATE articulos SET tit=?, cont=?, fecha=?, id_usr=? WHERE id_artic=?')){
                    $id_artic = $this->getIdArtic();
                    $tit = $this->getTit();
                    $cont = $this->getCont();
                    $fecha = $this->getFecha();
                    $id_usr = $this->getIdUsr();
                    $query->bindParam(1, $tit);
                    $query->bindParam(2, $cont);
                    $query->bindParam(3, $fecha);
                    $query->bindParam(4, $id_usr);
                    $query->bindParam(5, $id_artic);
                    $query->execute();
                }
            }
            $this->desconectar();
        }
        public function modiJSON(){
            $this->setIdArtic($_POST['id_artic']);
            $this->setTit($_POST['tit']);
            $this->setCont($_POST['cont']);
            $this->setFecha($_POST['fecha']);
            $this->setIdUsr($_POST['id_usr']);
            $this->setFoto($_FILES['foto']);
            $this->modiArtic();
            $datos = [];
            $datos['msg'] = 'El Artículo ha sido modificado correctamente';
            $datos['id_artic'] = $_POST['id_artic'];
            $datos['tit'] = $_POST['tit'];
            $datos['cont'] = $_POST['cont'];
            $datos['fecha'] = $_POST['fecha'];
            $datos['id_usr'] = $_POST['id_usr'];
            $datos['foto'] = $_FILES['foto']['name'];
            header('Content-Type: application/json');
            print_r(json_encode($datos));
        }
        public function borrarArtic(){
            $this->conectar();
            if ($query = $this->conn->prepare('DELETE FROM articulos WHERE id_artic=?')){
                $id = $this->getIdArtic();
                $query->bindParam(1, $id);
                $query->execute();
            }
            $this->desconectar();
        }
        public function borrarJSON(){
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            $this->setIdArtic($data[0]['id_artic']);
            $this->borrarArtic();
            $datos = [];
            $datos['msg'] = 'El Artículo ha sido removido correctamente';
            $datos['id_artic'] = $data[0]['id_artic'];
            header('Content-Type: application/json');
            print_r(json_encode($datos));
        }
        public function leerArtic(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM articulos") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerJSON(){
            $datos = $this->leerArticPorNuevo();
            header('Content-Type: application/json');
            print_r(json_encode($datos));
        }
        public function leerUnArtic(){
            $this->conectar();
            if ($query = $this->conn->prepare('SELECT * FROM articulos WHERE id_artic=?')){
                $id = $this->getIdArtic();
                $query->bindParam(1, $id);
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
        public function leerArticPorNuevo(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM articulos ORDER BY fecha DESC") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
    }
    $nuevoArtic = new Articulo;
?>