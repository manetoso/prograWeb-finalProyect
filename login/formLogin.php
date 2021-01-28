<?php
    session_start();
    if (isset($_SESSION['sesion'])){
        $numRol = $_SESSION['sesion'];
        switch ($numRol) {
            case '1':
                header('Location: ../views/sup.view.php');
                break;
            case '2':
                header('Location: ../views/admin.view.php');
                break;
            default:
                # code...
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../class/bd.class.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/box-heading-bg.png">
    <link rel="stylesheet" href="../styles/bootstrap.css">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Agroquímica BFA Agro</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="card col-md-6">
                <article class="card-body">
                    <h1 class="card-title mb-1 mt-1 text-center">Inicio de sesión</h1>
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Advertencia!</h4>
                        <p class="mb-0">Por ahora el servicio de usuarios sólo está habilitado para empleados de BFAAgro por lo tanto, si eres un cliente, <a href="../index.php" class="alert-link">Es mejor que regreses al sitio web</a>.</p>
                        <p>Por su atención y comprensión gracias.</p>
                        <h6>Att: Gerencia de BFAAgro.</h6>
                    </div>
                    <form method="POST" action="procesoLogin.php">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="usr" class="form-control" placeholder="BFAAgro">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="con" class="form-control" placeholder="****">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="../index.php" class="btn btn-danger">Regresar al inicio</a>
                        </div>
                    </form>
                    <div id="msg_error" class="alert alert-danger" role="alert" style="display: none;">ERROR</div>
                </article>
            </div>
        </div>
    </div>
        <!-- SCRIPTS PARA BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../scripts/index.js"></script>
</body>
</html>