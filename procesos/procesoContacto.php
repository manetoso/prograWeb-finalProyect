<?php
    include_once('../class/sistema.class.php');
    $accion = (isset($_GET["action"]))?$_GET["action"]:null;

    switch ($accion) {
        case 'enviar':
            if (!isset($_POST['copyright'])){
                $msg = 'Por favor seleccione la opción "Estoy de acuerdo con los términos y condiciones de BFAAgro" y vuelva a dar click en enviar.';
                $cont = $_POST['cont'];
                include('../contacto.php');
            } elseif (empty($_POST['correo'])){
                $errorCorreo = 'Es necesario que nos brinde su correo electrónico para continuar.';
                $cont = $_POST['cont'];
                include('../contacto.php');
            } elseif (empty($_POST['cont'])){
                $errorCont = 'Es necesario que llene este campo.';
                include('../contacto.php');
            } else {
                $nom = (empty($_POST['nom'])) ? 'Interesado Anónimo' : $_POST['nom'];
                $correo = $_POST['correo'];
                $cont = $_POST['cont'];
                $infoDe = $_POST['cr'];
                $nuevoSis->enviarCorreo($nom, $infoDe, $cont, $correo);
                $msgExito = 'La información se ha enviado de forma exitosa, un empleado le responderá pronto.<br/>Gracias por confiar en nosotros.';
                $cont = false;
                include('../contacto.php');
            }
            break;

        default:
            include('../contacto.php');
            break;
    }
?>