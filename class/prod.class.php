<?php
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;
    require_once('bd.class.php');
    class Prod extends Database{
        var $id_prod;
        var $nom;
        var $tit;
        var $ben;
        var $dosi;
        var $foto;
        var $id_cat;
        var $id_pre;
        var $id_presprod;
        var $pu;

        public function getIdProd(){
            return $this->id_prod;
        }
        public function setIdProd($id_prod){
            $this->id_prod = $id_prod;
        }
        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getTit(){
            return $this->tit;
        }
        public function setTit($tit){
            $this->tit = $tit;
        }
        public function getBen(){
            return $this->ben;
        }
        public function setBen($ben){
            $this->ben = $ben;
        }
        public function getDosi(){
            return $this->dosi;
        }
        public function setDosi($dosi){
            $this->dosi = $dosi;
        }
        public function getFoto(){
            return $this->foto;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }
        public function getIdCat(){
            return $this->id_cat;
        }
        public function setIdCat($id_cat){
            $this->id_cat = $id_cat;
        }
        public function getIdPre(){
            return $this->id_pre;
        }
        public function setIdPre($id_pre){
            $this->id_pre = $id_pre;
        }
        public function getIdPresProd(){
            return $this->id_presprod;
        }
        public function setIdPresProd($id_presprod){
            $this->id_presprod = $id_presprod;
        }
        public function getPu(){
            return $this->pu;
        }
        public function setPu($pu){
            $this->pu = $pu;
        }
        public function crearProd(){
            $this->conectar();
            $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
            if (file_exists($_FILES['foto']['name'])){
                if (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/prod/'.$_FILES['foto']['name'])){
                    if($query = $this->conn->prepare("INSERT INTO producto(nom, tit, ben, dosi, foto, id_cat) VALUES (?,?,?,?,?,?)")){
                        $nom = $this->getNom();
                        $tit = $this->getTit();
                        $ben = $this->getBen();
                        $dosi = $this->getDosi();
                        $id_cat = $this->getIdCat();
                        $query->bindParam(1, $nom);
                        $query->bindParam(2, $tit);
                        $query->bindParam(3, $ben);
                        $query->bindParam(4, $dosi);
                        $query->bindParam(5, $tit.$_FILES['foto']['name']);
                        $query->bindParam(6, $id_cat);
                        $query->execute();
                    }
                }
            } elseif (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/prod/'.$_FILES['foto']['name'])){
                if($query = $this->conn->prepare("INSERT INTO producto(nom, tit, ben, dosi, foto, id_cat) VALUES (?,?,?,?,?,?)")){
                    $nom = $this->getNom();
                    $tit = $this->getTit();
                    $ben = $this->getBen();
                    $dosi = $this->getDosi();
                    $id_cat = $this->getIdCat();
                    $query->bindParam(1, $nom);
                    $query->bindParam(2, $tit);
                    $query->bindParam(3, $ben);
                    $query->bindParam(4, $dosi);
                    $query->bindParam(5, $_FILES['foto']['name']);
                    $query->bindParam(6, $id_cat);
                    $query->execute();
                }
            }
            $this->desconectar();
        }
        public function modiProd(){
            $this->conectar();
            if ($_FILES['foto']['name']){
                $_FILES['foto']['name'] = preg_replace('([^A-Za-z0-9_.])', '', $_FILES['foto']['name']);
                if (move_uploaded_file($_FILES['foto']['tmp_name'],'C:/xampp/htdocs/proyecto/fotos/prod/'.$_FILES['foto']['name'])){
                    if ($query = $this->conn->prepare('UPDATE producto SET nom=?, tit=?, ben=?, dosi=?, foto=?, id_cat=? WHERE id_prod=?')){
                        $id_prod = $this->getIdProd();
                        $nom = $this->getNom();
                        $tit = $this->getTit();
                        $ben = $this->getBen();
                        $dosi = $this->getDosi();
                        $id_cat = $this->getIdCat();
                        $query->bindParam(1, $nom);
                        $query->bindParam(2, $tit);
                        $query->bindParam(3, $ben);
                        $query->bindParam(4, $dosi);
                        $query->bindParam(5, $_FILES['foto']['name']);
                        $query->bindParam(6, $id_cat);
                        $query->bindParam(7, $id_prod);
                        $query->execute();
                    }
                }
            } else {
                if ($query = $this->conn->prepare('UPDATE producto SET nom=?, tit=?, ben=?, dosi=?, id_cat=? WHERE id_prod=?')){
                    $id_prod = $this->getIdProd();
                    $nom = $this->getNom();
                    $tit = $this->getTit();
                    $ben = $this->getBen();
                    $dosi = $this->getDosi();
                    $id_cat = $this->getIdCat();
                    $query->bindParam(1, $nom);
                    $query->bindParam(2, $tit);
                    $query->bindParam(3, $ben);
                    $query->bindParam(4, $dosi);
                    $query->bindParam(5, $id_cat);
                    $query->bindParam(6, $id_prod);
                    $query->execute();
                }
            }
            $this->desconectar();
        }
        public function borrarProd(){
            $this->conectar();
            $this->conn->beginTransaction();
            $sql = 'DELETE FROM pres_prod WHERE id_prod=?';
            if ($query = $this->conn->prepare($sql)){
                $id = $this->getIdProd();
                $query->bindParam(1, $id);
                $query->execute();
                $sql = 'DELETE FROM producto WHERE id_prod=?';
                if ($query = $this->conn->prepare($sql)){
                    $id = $this->getIdProd();
                    $query->bindParam(1, $id);
                    $query->execute();
                    $this->conn->commit();
                    $this->desconectar();
                    return true;
                }
            }
            $this->conn->rollBack();
            $this->desconectar();
        }
        public function leerProd(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerUnProd(){
            $this->conectar();
            if ($query = $this->conn->prepare('SELECT * FROM producto WHERE id_prod=?')){
                $id = $this->getIdProd();
                $query->bindParam(1, $id);
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
        public function leerCat1(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 1") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat2(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 2") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat3(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 3") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat4(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 4") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat5(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 5") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat6(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 6") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        public function leerCat7(){
            $this->conectar();
            $datos = [];
            foreach ($this->conn->query("SELECT * FROM producto WHERE id_cat = 7") as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        function leerPre($id_prod){
            $this->conectar();
            $sql =
            'SELECT prepro.*,
                pre.descr
            FROM producto p
                INNER JOIN pres_prod prepro ON p.id_prod = prepro.id_prod
                INNER JOIN presentacion pre ON prepro.id_pre = pre.id_pre
            WHERE prepro.id_prod = '.$id_prod;
            $datos = [];
            foreach ($this->conn->query($sql) as $resultado) {
                array_push($datos, $resultado);
            }
            $this->desconectar();
            return $datos;
        }
        function leerUnaPre($id_presprod){
            $this->conectar();
            $sql =
            'SELECT prepro.*,
                pre.descr
            FROM pres_prod prepro
                INNER JOIN presentacion pre ON prepro.id_pre = pre.id_pre
            WHERE prepro.id_presprod = '.$id_presprod;
            if ($query = $this->conn->prepare($sql)){
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
        function crearPre(){
            $this->conectar();
            $sql = 'INSERT INTO pres_prod(id_pre, id_prod, pu) VALUES (?,?,?)';
            if ($query = $this->conn->prepare($sql)){
                $id_pre = $this->getIdPre();
                $id_prod = $this->getIdProd();
                $pu = $this->getPu();
                $query->bindParam(1, $id_pre);
                $query->bindParam(2, $id_prod);
                $query->bindParam(3, $pu);
                $query->execute();
            }
            $this->desconectar();
        }
        function modiPre(){
            $this->conectar();
            $sql = 'UPDATE pres_prod SET id_pre=?, pu=? WHERE id_presprod=?';
            if ($query = $this->conn->prepare($sql)){
                $id_pre = $this->getIdPre();
                $pu = $this->getPu();
                $id_presprod = $this->getIdPresProd();
                $query->bindParam(1, $id_pre);
                $query->bindParam(2, $pu);
                $query->bindParam(3, $id_presprod);
                $query->execute();
            }
            $this->desconectar();
        }
        public function borrarPre(){
            $this->conectar();
            if ($query = $this->conn->prepare('DELETE FROM pres_prod WHERE id_presprod=?')){
                $id = $this->getIdPresProd();
                $query->bindParam(1, $id);
                $query->execute();
            }
            $this->desconectar();
        }
        public function leerCatUnProd($id_prod){
            $this->conectar();
            $sql =
            'SELECT c.*
            FROM producto p
                INNER JOIN categoria c ON p.id_cat = c.id_cat
            WHERE p.id_prod = '.$id_prod;
            if ($query = $this->conn->prepare($sql)){
                $query->execute();
                $resultado = $query->fetchAll();
                return $resultado[0];
            }
            $this->desconectar();
        }
        public function impProdInfo(){
            require_once ($_SERVER['DOCUMENT_ROOT'].'/proyecto/vendor/autoload.php');
            $id_prod = $_GET['id_prod'];
            $this->setIdProd($id_prod);
            $datos_prod = $this->leerUnProd();
            $datos_pre = $this->leerPre($id_prod);
            $datos_cat = $this->leerCatUnProd($id_prod);
            try {
                $content =
                '<page>

                    <h1 align="center">Productos BFAAgro</h1>
                    <img 
                        src="../fotos/prod/'.$datos_prod['foto'].'"
                        alt="Foto del producto"
                        style="width=300px;"
                    >
                    <br/>
                    <h4>Nombre del producto:</h4>
                    <p><strong>'.$datos_prod['nom'].'</strong></p>
                    <p>'.$datos_prod['tit'].'</p>
                    <br/>
                    <h4>Categoría a la que pertenece el producto:</h4>
                    <p>'.$datos_cat['descr'].'</p>
                    <br/>
                    <h4>Beneficios del producto:</h4>
                    <p>'.$datos_prod['ben'].'</p>
                    <br/>
                    <h4>Dosis de uso:</h4>
                    <p>'.$datos_prod['dosi'].'</p>
                    <br/>
                    <h4>El producto se ecuentra en las siguientes presentaciones:</h4>
                    <table>
                        <thead>
                            <tr>
                                <th align="center">Presentación</th>
                                <th align="center">Precio unitario por envase o bolsa</th>
                            </tr>
                        </thead>
                        <tbody>';
                        foreach ($datos_pre as $key=>$value){
                            $content.='
                            <tr>
                                <th align="center" style="font-weight: normal;">'.$value["descr"].'</th>
                                <th align="center" style="font-weight: normal;">'.$value["pu"].' / envase o bolsa</th>
                            </tr>
                            ';
                        }
                $content.=
                        '</tbody>
                    </table>
                </page>';
            
                $html2pdf = new Html2Pdf('P', 'A4', 'es');
                $html2pdf->writeHTML($content);
                $html2pdf->output('Información del producto '.$datos_prod['nom'].'.pdf');
            } catch (Html2PdfException $e) {
                $html2pdf->clean();
            
                $formatter = new ExceptionFormatter($e);
                echo $formatter->getHtmlMessage();
            }
        }
    }
    $nuevoProd = new Prod;
?>