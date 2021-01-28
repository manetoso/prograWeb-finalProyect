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
include('../class/usuario.class.php');
include('../class/arti.class.php');
$accion = (isset($_GET["action"]))?$_GET["action"]:null;

switch ($accion) {
    case 'crear':
        $datos = [
            "tit" => (isset($_POST["tit"])) ? $_POST["tit"]:null,
            "cont" => (isset($_POST["cont"])) ? $_POST["cont"]:null,
            "fecha" => (isset($_POST["fecha"])) ? $_POST["fecha"]:null,
            "id_usr" => (isset($_POST["id_usr"])) ? $_POST["id_usr"]:null,
        ];
        $nuevoArtic->setTit($datos['tit']);
        $nuevoArtic->setCont($datos['cont']);
        $nuevoArtic->setFecha($datos['fecha']);
        $nuevoArtic->setIdUsr($datos['id_usr']);
        $nuevoArtic->crearArtic();
        header('Location: procesoArtic.php');
        break;
    case 'modi':
        $datos = [
            'id_artic' =>(isset($_POST['id_artic'])) ? $_POST['id_artic']:null,
            "tit" => (isset($_POST["tit"])) ? $_POST["tit"]:null,
            "cont" => (isset($_POST["cont"])) ? $_POST["cont"]:null,
            "fecha" => (isset($_POST["fecha"])) ? $_POST["fecha"]:null,
            "id_usr" => (isset($_POST["id_usr"])) ? $_POST["id_usr"]:null,
        ];
        $nuevoArtic->setTit($datos['tit']);
        $nuevoArtic->setCont($datos['cont']);
        $nuevoArtic->setFecha($datos['fecha']);
        $nuevoArtic->setIdUsr($datos['id_usr']);
        $nuevoArtic->setIdArtic($datos['id_artic']);
        $nuevoArtic->modiArtic();
        header('Location: procesoArtic.php');
        break;
    case 'form':
        $datos = [
            "tit" => "",
            "cont" => "",
            "fecha" => "",
            "id_usr" => "",
        ];
        $datos_usr = $usuario->leerUsr();
        $id_artic = (isset($_GET["id_artic"]))?$_GET["id_artic"]:null;
        if(is_numeric($id_artic)){
            $nuevoArtic->setIdArtic($id_artic);
            $datos = $nuevoArtic->leerUnArtic();
            $script = 'procesoArtic.php?action=modi';
            include("../views/formArtic.view.php");
        } else {
            $script = "procesoArtic.php?action=crear";
            include("../views/formArtic.view.php");
        }
        break;
    case 'borrar':
        $id_artic = (isset($_GET['id_artic'])) ? $_GET['id_artic']:null;
        if (is_numeric(($id_artic))){
            $nuevoArtic->setIdArtic($id_artic);
            $nuevoArtic->borrarArtic();
        }
        header('Location: procesoArtic.php');
        break;
    case 'json':
        $metodo = $_SERVER["REQUEST_METHOD"];
            switch ($metodo) {
                case 'POST':
                    if (isset($_POST['id_artic'])){
                        $nuevoArtic->modiJSON();
                    } else {
                        $nuevoArtic->crearJSON();
                    }
                    break;
                case 'DELETE':
                    $nuevoArtic->borrarJSON();
                    break;
                case 'GET':
                default:
                    $nuevoArtic->leerJSON();
                    break;
            }
            break;
        break;
    default:
        $datos = $nuevoArtic->leerArtic();
        include('../views/listaArtic.view.php');
        break;
}
?>