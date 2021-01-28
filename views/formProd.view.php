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
                    <h1 class="card-title mb-1 mt-1 text-center"><?php echo is_numeric($id_prod) ? "Modificar Producto" : "Agregar Producto" ?></h1>
                    <div class="row justify-content-between mt-3">
                        <!-- BOTÓN CON MODAL DE AYUDA -->
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalAyuda">
                            Ayuda
                        </button>
                        <a href="../procesos/procesoProd.php" class="btn btn-danger">Regresar</a>
                    </div>
                    <form action="<?php echo $script; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nombre del producto</label>
                            <input type="text" name="nom" value="<?php echo $datos["nom"]; ?>" class="form-control" placeholder="Producto BFAAgro">
                            <small class="form-text text-muted">Agrega un nombre para este producto</small>
                        </div>
                        <div class="form-group">
                            <label>Título del producto</label>
                            <input type="text" name="tit" value="<?php echo $datos["tit"]; ?>" class="form-control" placeholder="La elección correcta para...">
                            <small class="form-text text-muted">Agrega un título para el producto</small>
                        </div>
                        <div class="form-group">
                            <label for="benId">Beneficios del producto</label>
                            <textarea name="ben" id="benId" class="form-control" rows="10"><?php echo $datos["ben"]; ?></textarea>
                            <small class="form-text text-muted">Escribe los beneficios de usarlo</small>
                        </div>
                        <div class="form-group">
                            <label for="dosiId">Dosis del producto</label>
                            <textarea name="dosi" id="dosiId" class="form-control" rows="10"><?php echo $datos["dosi"]; ?></textarea>
                            <small class="form-text text-muted">Escribe las dosis de uso del producto</small>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col col-sm-4">
                                <?php if (isset($id_prod)){ ?>
                                    <img
                                        class="rounded"
                                        src="../fotos/prod/<?php echo $datos['foto'] ?>"
                                        alt="Foto del producto"
                                        width="100%"
                                        height="250px"
                                    >
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Foto del producto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="archivo" lang="es">
                                <label class="custom-file-label" for="archivo">
                                    <?php 
                                        if (isset($id_prod)){
                                            echo $datos["foto"];
                                        } else {
                                            echo 'Elige un archivo';
                                        }
                                    ?>
                                </label>
                            </div>
                            <small class="form-text text-muted">Suba una foto de su producto</small>
                        </div>
                        <div class="form-group">
                            <label>Categoría del producto</label>
                            <select name="id_cat" id="cat" class="form-control">
                                <?php $i=1; foreach($datos_cat as $resu=>$fila): ?>
                                    <option value="<?php echo($fila['id_cat']); ?>"
                                    <?php echo $fila['id_cat'] == $datos['id_cat'] ? 'selected' : ' '; ?> >
                                        <?php echo($i . '.- ' . $fila['descr']); ?>
                                    </option>
                                <?php $i++; endforeach; ?>
                            </select>
                            <small class="form-text text-muted">Asigna una categoría para el producto</small>
                        </div>
                        <div class="form-group">
                            <?php if (is_numeric($id_prod)) { ?>
                                <input type="hidden" name="id_prod" value="<?php echo $datos['id_prod']; ?>" />
                            <?php } ?>
                            <input type="submit" name="enviar" value="<?php echo is_numeric($id_prod) ? "Modificar Producto" : "Agregar Producto" ?>" class="btn btn-success btn-block"></input>
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
                    <p>Estás dentro del formulario para crear o modificar productos.</p>
                    <p>Es necesario ser Administrador como mínimo para poder acceder a este formulario.</p>
                    <p>Desde aquí podrá crear productos nuevos o modificar el seleccionado, dependido a su selección en la pantalla anterior.</p>
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