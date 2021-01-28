<?php
    session_start();
    if (isset($_SESSION['sesion'])){
        $numRol = $_SESSION['sesion'];
        switch ($numRol) {
            case '2':
                header('Location: ../views/admin.view.php');
                break;
            default:
                break;
        }
    }
include('../class/usuario.class.php');
include('../class/rol.class.php');
$accion = (isset($_GET["action"]))?$_GET["action"]:null;

switch ($accion) {
    case 'crear':
        $datos = [
            "usr" => (isset($_POST["usr"])) ? $_POST["usr"]:null,
            "con" => (isset($_POST["con"])) ? $_POST["con"]:null,
            "id_rol" => (isset($_POST["id_rol"])) ? $_POST["id_rol"]:null,
        ];
        $usuario->setUsr($datos['usr']);
        $usuario->setCon($datos['con']);
        $usuario->setId_rol($datos['id_rol']);
        $usuario->crearUsr();
        header('Location: procesoUsr.php');
        break;
    case 'modi':
        $datos = [
            'id_usr' =>(isset($_POST['id_usr'])) ? $_POST['id_usr']:null,
            "usr" => (isset($_POST["usr"])) ? $_POST["usr"]:null,
            "con" => (isset($_POST["con"])) ? $_POST["con"]:null,
            "id_rol" => (isset($_POST["id_rol"])) ? $_POST["id_rol"]:null,
        ];
        $usuario->setId_usr($datos['id_usr']);
        $usuario->setUsr($datos['usr']);
        $usuario->setCon($datos['con']);
        $usuario->setId_rol($datos['id_rol']);
        $usuario->modiUsr();
        header('Location: procesoUsr.php');
        break;
    case 'form':
        $datos = [
            "usr" => "",
            "con" => "",
            "id_rol" => "",
        ];
        $datos_rol = $nuevoRol->leerRol();
        $id_usr = (isset($_GET["id_usr"]))?$_GET["id_usr"]:null;
        if(is_numeric($id_usr)){
            $usuario->setId_usr($id_usr);
            $datos = $usuario->leerUnUsr();
            $script = 'procesoUsr.php?action=modi';
            include("../views/formUsr.view.php");
        } else {
            $script = "procesoUsr.php?action=crear";
            include("../views/formUsr.view.php");
        }
        break;
    case 'borrar':
        $id_usr = (isset($_GET['id_usr'])) ? $_GET['id_usr']:null;
        if (is_numeric(($id_usr))){
            $usuario->setId_usr($id_usr);
            $usuario->borrarUsr();
        }
        header('Location: procesoUsr.php');
        break;
    default:
        $datos_rol = $nuevoRol->leerRol();
        $datos = $usuario->leerUsr();
        include('../views/listaUsr.view.php');
        break;
}
?>