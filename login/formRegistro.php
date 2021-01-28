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
                    <h1 class="card-title mb-4 mt-1 text-center">Registro</h1>
                    <form action="POST" class="form_registro">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="correo@ejemplo.com">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="****">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Registrarse</button>
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