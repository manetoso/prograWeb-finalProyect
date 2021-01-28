<?php
    session_start();
    if (isset($_SESSION['sesion'])){
        // $numRol = $_SESSION['sesion'];
        // switch ($numRol) {
        //     case '3':
        //         header('Location: ../views/admin.view.php');
        //         break;
        //     default:
        //         break;
        // }
    }
include('../class/cat.class.php');
include('../class/prod.class.php');
include('../class/pre.class.php');
$accion = (isset($_GET["action"]))?$_GET["action"]:null;

switch ($accion) {
    case 'crear':
        $datos = [
            "nom" => (isset($_POST["nom"])) ? $_POST["nom"]:null,
            "tit" => (isset($_POST["tit"])) ? $_POST["tit"]:null,
            "ben" => (isset($_POST["ben"])) ? $_POST["ben"]:null,
            "dosi" => (isset($_POST["dosi"])) ? $_POST["dosi"]:null,
            "id_cat" => (isset($_POST["id_cat"])) ? $_POST["id_cat"]:null,
        ];
        $nuevoProd->setNom($datos['nom']);
        $nuevoProd->setTit($datos['tit']);
        $nuevoProd->setBen($datos['ben']);
        $nuevoProd->setDosi($datos['dosi']);
        $nuevoProd->setIdCat($datos['id_cat']);
        $nuevoProd->crearProd();
        header('Location: procesoProd.php');
        break;
        
    case 'modi':
        $datos = [
            "id_prod" => (isset($_POST["id_prod"])) ? $_POST["id_prod"]:null,
            "nom" => (isset($_POST["nom"])) ? $_POST["nom"]:null,
            "tit" => (isset($_POST["tit"])) ? $_POST["tit"]:null,
            "ben" => (isset($_POST["ben"])) ? $_POST["ben"]:null,
            "dosi" => (isset($_POST["dosi"])) ? $_POST["dosi"]:null,
            "id_cat" => (isset($_POST["id_cat"])) ? $_POST["id_cat"]:null,
        ];
        $nuevoProd->setIdProd($datos['id_prod']);
        $nuevoProd->setNom($datos['nom']);
        $nuevoProd->setTit($datos['tit']);
        $nuevoProd->setBen($datos['ben']);
        $nuevoProd->setDosi($datos['dosi']);
        $nuevoProd->setIdCat($datos['id_cat']);
        $nuevoProd->modiProd();
        header('Location: procesoProd.php');
        break;

    case 'form':
        $datos = [
            "nom" => "",
            "tit" => "",
            "ben" => "",
            "dosi" => "",
            "id_cat" => "",
        ];
        $datos_cat = $nuevaCat->leerCat();
        $id_prod = (isset($_GET["id_prod"]))?$_GET["id_prod"]:null;
        if(is_numeric($id_prod)){
            $nuevoProd->setIdProd($id_prod);
            $datos = $nuevoProd->leerUnProd();
            $script = 'procesoProd.php?action=modi';
            include("../views/formProd.view.php");
        } else {
            $script = "procesoProd.php?action=crear";
            include("../views/formProd.view.php");
        }
        break;

    case 'borrar':
        $id_prod = (isset($_GET['id_prod'])) ? $_GET['id_prod']:null;
        if (is_numeric(($id_prod))){
            $nuevoProd->setIdProd($id_prod);
            $nuevoProd->borrarProd();
        }
        header('Location: procesoProd.php');
        break;
    
    case 'pres':
        $id_prod = (isset($_GET["id_prod"]))?$_GET["id_prod"]:null;
        $nuevoProd->setIdProd($id_prod);
        $datos_prod = $nuevoProd->leerUnProd();
        $datos = $nuevoProd->leerPre($id_prod);
        include ('../views/listaPre.view.php');
        break;
    
    case 'formPre':
        $datos_unPre = [
            "id_prod" => "",
            "id_pre" => "",
            "pu" => "",
            "descr" => "",
        ];
        $datos_pre = $newPre->leerPre();
        $id_prod = (isset($_GET["id_prod"]))?$_GET["id_prod"]:null;
        $id_presprod = (isset($_GET["id_presprod"]))?$_GET["id_presprod"]:null;
        if(is_numeric($id_presprod)){
            $datos_unPre = $nuevoProd->leerUnaPre($id_presprod);
            $script = 'procesoProd.php?action=modiPre';
            include("../views/formPre.view.php");
        } else {
            $script = "procesoProd.php?action=crearPre";
            include("../views/formPre.view.php");
        }
        break;

    case 'crearPre':
        $datos = [
            "id_prod" => (isset($_POST["id_prod"])) ? $_POST["id_prod"]:null,
            "id_pre" => (isset($_POST["id_pre"])) ? $_POST["id_pre"]:null,
            "pu" => (isset($_POST["pu"])) ? $_POST["pu"]:null,
        ];
        $nuevoProd->setIdProd($datos['id_prod']);
        $nuevoProd->setIdPre($datos['id_pre']);
        $nuevoProd->setPu($datos['pu']);
        $nuevoProd->crearPre();
        header('Location: procesoProd.php?action=pres&id_prod='.$datos['id_prod']);
        break;

    case 'modiPre':
        $datos = [
            "id_presprod" => (isset($_POST["id_presprod"])) ? $_POST["id_presprod"]:null,
            "id_prod" => (isset($_POST["id_prod"])) ? $_POST["id_prod"]:null,
            "id_pre" => (isset($_POST["id_pre"])) ? $_POST["id_pre"]:null,
            "pu" => (isset($_POST["pu"])) ? $_POST["pu"]:null,
        ];
        $nuevoProd->setIdPresProd($datos['id_presprod']);
        $nuevoProd->setIdProd($datos['id_prod']);
        $nuevoProd->setIdPre($datos['id_pre']);
        $nuevoProd->setPu($datos['pu']);
        $nuevoProd->modiPre();
        header('Location: procesoProd.php?action=pres&id_prod='.$datos['id_prod']);
        break;

    case 'borrarPre':
        $id_presprod = (isset($_GET['id_presprod'])) ? $_GET['id_presprod']:null;
        if (is_numeric(($id_presprod))){
            $nuevoProd->setIdPresProd($id_presprod);
            $nuevoProd->borrarPre();
        }
        header('Location: procesoProd.php?action=pres&id_prod='.$datos['id_prod']);
        break;
        
    default:
        $datos_cat = $nuevaCat->leerCat();
        $datos = $nuevoProd->leerProd();
        include('../views/listaProd.view.php');
        break;
}
?>