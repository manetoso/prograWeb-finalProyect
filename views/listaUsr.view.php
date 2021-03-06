<?php
    if (!isset($_SESSION['sesion'])) {
        header('Location: ../login/formLogin.php');
    } elseif (isset($_SESSION['sesion'])){
        $numRol = $_SESSION['sesion'];
        switch ($numRol) {
            case '2':
                header('Location: ../views/admin.view.php');
                break;

            case '3':
                header('Location: ../views/emp.view.php');
                break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
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
        <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="card col-md-12">
                <article class="card-body">
                    <h1 class="card-title mb-1 mt-1 text-center">Lista de usuarios</h1>
                    <div class="row justify-content-between mt-3">
                        <a href="../procesos/procesoUsr.php?action=form" class="btn btn-success">Agregar un usuario</a>
                        <a href="../views/sup.view.php" class="btn btn-primary">Regresar al menú de Supervisor</a>
                    </div>
                    <div class="row justify-content-between table-responsive-xl mt-3">
                        <!-- BOTÓN CON MODAL DE AYUDA -->
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalAyuda">
                            Ayuda
                        </button>
                        <a href="../login/procesoLogout.php" class="btn btn-outline-danger">Cerrar Sesión</a>
                    </div>
                    <table class="table table-hover mt-3">
                        <thead>
                            <tr class="table-success">
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Nombre de usuario</th>
                                <th scope="col" class="text-center">Rol del usuario</th>
                                <th scope="col" class="text-center">Modificar</th>
                                <th scope="col" class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($datos as $resultado=>$fila ){
                            ?>
                            <tr>
                                <th scope="row"><?php echo($i); ?></th>
                                <td class="text-center"><?php echo($fila["usr"]) ?></td>
                                <td class="text-center">
                                    <?php
                                        foreach($datos_rol as $resultado2=>$fila2){
                                            if ($fila['id_rol'] == $fila2['id_rol']){
                                                echo $fila2['descr'];
                                            }
                                        }
                                    ?>
                                </td>
                                <td class="text-center"><a class="btn btn-warning" href="procesoUsr.php?action=form&id_usr=<?php echo($fila["id_usr"]); ?>" role="button">Modificar Usuario</a></td>
                                <td class="text-center"><a class="btn btn-danger" href="procesoUsr.php?action=borrar&id_usr=<?php echo($fila["id_usr"]); ?>" role="button">Eliminar Usuario</a></td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>
    <!-- MODAL DE AYUDA -->
    <div class="modal fade" id="modalAyuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Qué estoy viendo?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estás dentro del menú de acciones sobre los usuarios.</p>
                    <p>El Supervisor es el único usuario capaz de acceder a este menú.</p>
                    <p>Desde aquí el supervisor podrá ver los usuarios de la página web, crear nuevos, eliminar y modificar los ya existentes.</p>
                    <p>Para realizar alguna de estas acciones haga click en cada uno de los botónes correspondientes. Si desea salir de este menú regrese al menú anterior o cerre sesión.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Entendido</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL DE AYUDA -->
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