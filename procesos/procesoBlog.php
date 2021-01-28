<?php
    include('../class/arti.class.php');
    include('../class/usuario.class.php');
    include('./procesoPagArtic.php');
    $accion = (isset($_GET["action"]))?$_GET["action"]:null;

    switch ($accion) {
        default:
            $datos_usr = $usuario->leerUsr();
            $datos = $nuevoArtic->leerArticPorNuevo();
            include('../blog.php');
            break;
    }
?>