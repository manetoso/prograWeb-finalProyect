<?php
    include('../procesos/procesoPagArticList.php');
    if (!isset($_SESSION['sesion'])) {
        header('Location: ../login/formLogin.php');
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
                        <a href="../procesos/procesoArtic.php?action=form" class="btn btn-success">Agregar un artículo</a>
                        <a href="../views/sup.view.php" class="btn btn-primary">Regresar al menú anterior</a>
                    </div>
                    <div class="row justify-content-between mt-3">
                        <!-- BOTÓN CON MODAL DE AYUDA -->
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalAyuda">
                            Ayuda
                        </button>
                        <a href="../login/procesoLogout.php" class="btn btn-outline-danger">Cerrar Sesión</a>
                    </div>
                    <table class="table table-hover table-responsive-xl mt-3">
                        <thead>
                            <tr class="table-success">
                                <th scope="col" class="text-center">ID del articulo</th>
                                <th scope="col" class="text-center">Portada del artículo</th>
                                <th scope="col" class="text-center">Titulo del artículo</th>
                                <th scope="col" class="text-center">Fecha de publicación</th>
                                <th scope="col" class="text-center">Modificar</th>
                                <th scope="col" class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($regs as $resultado=>$fila ){
                            ?>
                            <tr>
                                <th scope="row"><?php echo($fila['id_artic']); ?></th>
                                <td class="text-center">
                                    <img
                                        class="rounded"
                                        src="../fotos/artic/<?php echo($fila['foto'])?>"
                                        alt="Portada del artículo"
                                        width="130px"
                                        height="100px"
                                    >
                                </td>
                                <td class="text-center"><?php echo($fila["tit"]) ?></td>
                                <td class="text-center"><?php echo($fila["fecha"]) ?></td>
                                <td class="text-center"><a class="btn btn-warning" href="procesoArtic.php?action=form&id_artic=<?php echo($fila["id_artic"]); ?>" role="button">Modificar Artículo</a></td>
                                <td class="text-center"><a class="btn btn-danger" href="procesoArtic.php?action=borrar&id_artic=<?php echo($fila["id_artic"]); ?>" role="button">Eliminar Artículo</a></td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- INICIO PAGINACIÓN -->
                    <nav aria-label="Page navigation " class=" mt-4">
                        <div>
                            <ul class="pagination justify-content-center">
                                <?php if($pag == 1): ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">&laquo;</a>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item">
                                    <a class="page-link" href="procesoArtic.php?pag=<?php echo $pag-1 ?>">&laquo;</a>
                                </li>
                                <?php 
                                    endif; 
                                    for($i=1; $i<=$numPags; $i++){
                                        if ($pag == $i){
                                            echo ('<li class="page-item active"><a class="page-link" href="procesoArtic.php?pag='.$i.'">'.$i.'</a></li>');
                                        } else {
                                            echo ('<li class="page-item"><a class="page-link" href="procesoArtic.php?pag='.$i.'">'.$i.'</a></li>');
                                        }
                                    }
                                    if ($pag == $numPags):
                                ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">&raquo;</a>
                                </li>
                                <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="procesoArtic.php?pag=<?php echo $pag+1 ?>">&raquo;</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- FIN PAGINACIÓN -->
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
                    <p>Estás dentro del menú de acciones sobre los artículos de la página web.</p>
                    <p>Cualquier empleado puede acceder a este menú.</p>
                    <p>Desde aquí podrá ver los artículos de la página web, crear nuevos, eliminar y modificar los ya existentes.</p>
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