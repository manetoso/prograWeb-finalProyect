<?php
    include_once '../class/bd.class.php';
    include_once '../class/cat.class.php';
    $datos_cat = $nuevaCat->leerCat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/box-heading-bg.png">
    <link rel="stylesheet" href="../styles/bootstrap.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/contacto.css">
    <!-- Material UI - Icons -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <title>Agroquímica BFA Agro</title>
</head>
<body>
    <!-- INICIO NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="../index.php">
                <img id="logo-navbar" src="../img/logo-bfa-agro.svg" alt="Logo BFA Agro">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Productos</a>
                        <div class="dropdown-menu">
                            <?php foreach ($datos_cat as $resultado=>$fila){ ?>
                                <a class="dropdown-item" href="./procesoProdG.php?accion=cat<?php echo($fila['id_cat']); ?>"><?php echo ($fila['descr']) ?></a>
                            <?php } ?>
                            <small class="form-text text-muted">---------------------------------------------------------------------------------------------------------------------------------</small>
                            <a class="dropdown-item" href="./procesoProdG.php">Todos los productos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./procesoBlog.php">Blog</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="../login/formLogin.php" class="btn btn-success my-2 my-sm-0" type="submit">Login</a>
                </form>
            </div>
        </nav>
    </header>
    <!-- FIN NAVBAR -->
    <!-- INICIO FORMULARIO -->
    <div class="container" id="top-contenedor">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-7 mt-4">
                <article class="card-body">
                    <h1 class="card-title mb-1 mt-1 text-center">Por favor llene la siguiente información</h1>
                    <form action="procesoContacto.php?action=enviar" method="POST">
                        <?php if (!empty($msg)): ?>
                            <div class="alert alert-dismissible alert-danger">
                                <strong>Ocurrió un problema!,</strong>
                                <?php echo($msg); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($msgExito)): ?>
                            <div class="alert alert-dismissible alert-success">
                                <strong>Bien hecho!, </strong>
                                <?php echo($msgExito); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Nombre del interesado</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nombre">
                            <small id="nameHelp" class="form-text text-muted">Puedes saltarte esta opción, pero seria de gran ayuda para nosotros.</small>
                        </div>
                        <?php if (!empty($errorCorreo)) { ?>
                            <div class="form-group has-danger">
                                <label class="form-control-label" for="inputCorreoInvalido">Correo electrónico</label>
                                <input type="text" value="Ingrese su correo electrónico" class="form-control is-invalid" id="inputCorreoInvalido">
                                <div class="invalid-feedback"><?php echo($errorCorreo); ?></div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="email" name="correo" class="form-control" placeholder="Escribe tu correo electrónico">
                                <small id="emailHelp" class="form-text text-muted">No compartiremos esta información con nadie más.</small>
                            </div>
                        <?php } ?>
                        <?php if (!empty($errorCont)){ ?>
                            <div class="form-group has-danger">
                                <label>Escribe información detallada de lo que necesitas aquí:</label>
                                <textarea name="cont" id="contId" class="form-control is-invalid" rows="10" placeholder="Por favor, brindenos más información sobre su interés."></textarea>
                                <div class="invalid-feedback"><?php echo($errorCont) ?></div>
                            </div>
                        <?php } else {  ?>
                            <div class="form-group">
                                <label>Escribe información detallada de lo que necesitas aquí:</label>
                                <textarea name="cont" id="contId" class="form-control" rows="10"><?php if(!empty($cont)) : echo($cont); endif; ?></textarea>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <legend>Buscas información sobre:</legend>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cr1" name="cr" class="custom-control-input" checked="" value="Información específica de algún producto">
                                    <label class="custom-control-label" for="cr1">Información específica de algún producto.</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cr2" name="cr" class="custom-control-input" value="Existencia de productos">
                                    <label class="custom-control-label" for="cr2">Existencia de productos.</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cr3" name="cr" class="custom-control-input" value="Otro">
                                    <label class="custom-control-label" for="cr3">Otro.</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="copyright" class="custom-control-input" id="copyright" checked="">
                                <label class="custom-control-label" for="copyright">He leído y estoy de acuerdo con los <b>&copy; terminos y condiciones de BFAgro.</b></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary btn-block" id="sub-btn">
                            <div class="row justify-content-end mt-3">
                                <a href="../index.php" class="btn btn-outline-danger">Cancelar envio</a>
                            </div>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
    <!-- FIN FORMULARIO -->
    <!-- INICIO MAPA -->
    <div class="container">
        <div class="row d-flex mt-5 mb-0">
            <div id="map-h1" class="col-md-6">
                <h1>Puedes encontrarnos en: </h1>
                <i class="material-icons">room</i>
            </div>
            <div class="col-md-6">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.984292109597!2d-101.72662068468333!3d19.456244044964883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDI3JzIyLjUiTiAxMDHCsDQzJzI4LjAiVw!5e0!3m2!1ses!2smx!4v1608683709535!5m2!1ses!2smx" 
                    width="100%" 
                    height="250" 
                    frameborder="0" 
                    style="border:0;" 
                    allowfullscreen="" 
                    aria-hidden="false" 
                    tabindex="0">
                </iframe>
            </div>
        </div>
    </div>
    <!-- FIN MAPA -->
    <!-- INICIO FOOTER -->
    <footer class="pie-de-pag mt-4">
        <div class="container">
            <div class="pie-logo text-center">
                <a href="index.html"><img src="./img/logo-bfa-agro.svg" alt=""></a>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Redes sociales</h2>
                    <p>Puedes encontrarnos en nuestras diferentes redes sociales también</p>
                    <div class="col-sm">
                        <a href="https://www.facebook.com/BFAAgro-605293486551391" target="_blank">
                            <img id="facebook" src="../img/img_trans.gif"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>Atención a clientes</h2>
                    <ul>
                        <li><a class="pie-lista" href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <p class="text-center">&copy; BFA Agro S.A. de C.V. 2020</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FIN FOTTER -->
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
    <script src="scripts/index.js"></script>   
</body>
</html>