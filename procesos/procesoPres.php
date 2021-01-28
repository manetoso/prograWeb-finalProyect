<?php
    session_start();
    if (!isset($_SESSION['sesion'])){
        header('Location: ../login/procesoLogin.php');
    }
include('../class/pre.class.php');
$accion = (isset($_GET["action"]))?$_GET["action"]:null;

switch ($accion) {
    case 'form':
        $datos = [
            "id_pre" => "",
            "descr" => "",
        ];
        $id_pre = (isset($_GET['id_pre'])) ? $_GET['id_pre']:null;
        if(is_numeric($id_pre)){
            $newPre->setIdPre($id_pre);
            $datos = $newPre->leerUnaPre();
            $script = 'procesoPres.php?action=modi';
            include("../views/formPres.view.php");
        } else {
            $script = "procesoPres.php?action=crear";
            include("../views/formPres.view.php");
        }
        break;

    case 'crear':
        $datos = [
            "id_pre" => (isset($_POST["id_pre"])) ? $_POST["id_pre"]:null,
            "descr" => (isset($_POST["descr"])) ? $_POST["descr"]:null,
        ];
        $newPre->setDescr($datos['descr']);
        $newPre->crearPre();
        header('Location: procesoPres.php');
        break;

    case 'modi':
        $datos = [
            "id_pre" => (isset($_POST["id_pre"])) ? $_POST["id_pre"]:null,
            "descr" => (isset($_POST["descr"])) ? $_POST["descr"]:null,
        ];
        $newPre->setIdPre($datos['id_pre']);
        $newPre->setDescr($datos['descr']);
        $newPre->modiPre();
        header('Location: procesoPres.php');
        break;

    case 'borrar':
        $id_pre = (isset($_GET['id_pre'])) ? $_GET['id_pre']:null;
        if (is_numeric(($id_pre))){
            $newPre->setIdPre($id_pre);
            $newPre->borrarPre();
        }
        header('Location: procesoPres.php');
        break;
        
    default:
        $datos = $newPre->leerPre();
        include('../views/listaPres.view.php');
        break;
}
?>