<?php
    if (!isset($_SESSION['sesion'])) {
        header('Location: ../login/formLogin.php');
    } elseif (isset($_SESSION['sesion'])){
        $numRol = $_SESSION['sesion'];
        switch ($numRol) {
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
            <div class="card col-md-9">
                <article class="card-body">
                    <h1 class="card-title mb-1 mt-1 text-center"><?php echo is_numeric($id_presprod) ? "Modificar Presentación" : "Agregar Presentación" ?></h1>
                    <div class="row justify-content-between mt-3">
                        <!-- BOTÓN CON MODAL DE AYUDA -->
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalAyuda">
                            Ayuda
                        </button>
                        <a href="../procesos/procesoProd.php?action=pres&id_prod=<?php echo($id_prod); ?>" class="btn btn-danger">Regresar</a>
                    </div>
                    <form action="<?php echo $script; ?>" method="POST">
                        <div class="form-group">
                            <label>Nombre de la presentación</label>
                            <select name="id_pre" id="pre" class="form-control">
                                <?php $i=1; foreach($datos_pre as $resu=>$fila): ?>
                                    <option value="<?php echo($fila['id_pre']); ?>"
                                    <?php echo $fila['id_pre'] == $datos_unPre['id_pre'] ? 'selected' : ' '; ?> >
                                        <?php echo($i . '.- ' . $fila['descr']); ?>
                                    </option>
                                <?php $i++; endforeach; ?>
                            </select>
                            <small class="form-text text-muted">Asigna una presentación para el producto</small>
                        </div>
                        <div>
                            <label>Presio unitario</label>
                            <input type="number" name="pu" value="<?php echo $datos_unPre["pu"]; ?>" class="form-control" placeholder="00.00">
                            <small class="form-text text-muted">Agrega un presio unitario por envase o bolsa para este producto</small>
                        </div>
                        <div class="form-group mt-3">
                            <?php if (is_numeric($id_prod)) { ?>
                                <input type="hidden" name="id_prod" value="<?php echo $id_prod; ?>" />
                            <?php } ?>
                            <?php if (is_numeric($id_presprod)) { ?>
                                <input type="hidden" name="id_presprod" value="<?php echo $id_presprod; ?>" />
                            <?php } ?>
                            <input type="submit" name="enviar" value="<?php echo is_numeric($id_presprod) ? "Modificar Presentación" : "Asignar Presentación" ?>" class="btn btn-success btn-block"></input>
                        </div>
                    </form>
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
                    <p>Estás dentro del formulario para crear o modificar presentaciones para un producto.</p>
                    <p>Es necesario ser Administrador como mínimo para poder acceder a este formulario.</p>
                    <p>Desde aquí podrá asignar presentaciones nuevas o modificar la seleccionada, dependido a su selección en la pantalla anterior.</p>
                    <p>Para realizar alguna de estas acciones llene el formulario con la información correspondiente o modifique sólo lo necesario. Si desea salir de este menú regrese al menú anterior o cerre sesión.</p>
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