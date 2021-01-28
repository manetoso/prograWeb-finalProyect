<?php
    session_start();
    include('../class/usuario.class.php');

    $usr = $_POST['usr'];
    $con = $_POST['con'];
    $usuario->setUsr($usr);
    $usuario->setCon($con);
    $datos = $usuario->validarUsr();
    if(empty($datos)){
        header('Location: formLogin.php');
    } else {
        $_SESSION['sesion'] = $datos['id_rol'];
        $numRol = $datos['id_rol'];
        switch ($numRol) {
            case '1':
                header('Location: ../views/sup.view.php');
                break;
            case '2':
                header('Location: ../views/admin.view.php');
                break;
            case '3':
                header('Location: ../views/emp.view.php');
                break;
            default:
                # code...
                break;
        }
    }
?>