<?php
    include './class/bd.class.php';
    include './class/cat.class.php';
    $datos_cat = $nuevaCat->leerCat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/box-heading-bg.png">
    <link rel="stylesheet" href="./styles/bootstrap.css">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Agroquímica BFA Agro</title>
</head>
<body>
    <!-- INICIO NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img id="logo-navbar" src="./img/logo-bfa-agro.svg" alt="Logo BFA Agro">
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
                                <a class="dropdown-item" href="./procesos/procesoProdG.php?accion=cat<?php echo($fila['id_cat']); ?>"><?php echo ($fila['descr']) ?></a>
                            <?php } ?>
                            <small class="form-text text-muted">---------------------------------------------------------------------------------------------------------------------------------</small>
                            <a class="dropdown-item" href="./procesos/procesoProdG.php">Todos los productos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./procesos/procesoBlog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./procesos/procesoContacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="./login/formLogin.php" class="btn btn-success my-2 my-sm-0" type="submit">Login</a>
                </form>
            </div>
        </nav>
    </header>
    <!-- FIN NAVBAR -->
    <!-- INICIO CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/slider/bg-maxxgreen.jpg" alt="moras" style="width: 100%;">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h5>Max + Green</h5>
                    <p>Corrige déficits metabólicos, bionutriente liguido alto en nitrógeno, magnesio y Fierro</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/slider/bg-fruit-size.jpg" alt="aguacates" style="width: 100%;">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h5>Fruit-Sice B</h5>
                    <p>Ayuda al desarrollo de fruto, alimentación de raíz y más beneficios</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/slider/bg-imperium.jpg" alt="pepinos" style="width: 100%;">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h5>Imperium</h5>
                    <p>Prevención, control e inducción de resistencia</p>
                    <p>Fungicida-bactericida de amplio espectro</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/slider/bg-micro-five.jpg" alt="ceresas" style="width: 100%;">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h5>Microfive F</h5>
                    <p>Tu cultivo creciendo de forma balanceada y armónica</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    <!-- FIN CAROUSEL -->
    <!-- CARDS -->
    <div class="container">
        <div class="row subtitulo-fila">
            <div class="col-sm-1">
                <img src="./img/box-heading-bg.png" alt="Logo BFA Agro">
            </div>
            <div class="col-sm-11">
                <h5>Productos Destacados</h5>
            </div>
        </div>
        <div id="card-container" class="row">
            <div class="card border-success" style="width: 16rem;">
                <img class="card-img-top img-cartas" src="./img/cartas/fruits-size-b-bfaagro-200x200.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Fruit-Size B</h5>
                    <a href="./procesos/procesoProdG.php?accion=info&id_prod=19" class="btn btn-success">Ver producto</a>
                </div>
            </div>
            <div class="card border-success" style="width: 16rem;">
                <img class="card-img-top img-cartas" src="./img/cartas/biocomplex-bfaagro-200x200.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Biocomplex</h5>
                    <a href="./procesos/procesoProdG.php?accion=info&id_prod=10" class="btn btn-success">Ver producto</a>
                </div>
            </div>
            <div class="card border-success" style="width: 16rem;">
                <img class="card-img-top img-cartas" src="./img/cartas/hass-micro-s-bfaagro-200x200.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Hass Micro S</h5>
                    <a href="./procesos/procesoProdG.php?accion=info&id_prod=12" class="btn btn-success">Ver producto</a>
                </div>
            </div>
            <div class="card border-success" style="width: 16rem;">
                <img class="card-img-top img-cartas" src="./img/cartas/em1-activado-bfaagro-200x200.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">EM-1 Activado</h5>
                    <a href="./procesos/procesoProdG.php?accion=info&id_prod=32" class="btn btn-success">Ver producto</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN CARTAS -->
    <!-- INICIO FOOTER -->
    <footer class="pie-de-pag">
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
                            <img id="facebook" src="./img/img_trans.gif"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>Atención a clientes</h2>
                    <ul>
                        <li><a class="pie-lista" href="./procesos/procesoContacto.php">Contacto</a></li>
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