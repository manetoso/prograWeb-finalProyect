<?php
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
            <a class="navbar-brand" href="./index.php">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nosotros</a>
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
    <!-- TEXTO -->
    <div class="container nosotros-txt">
        <h1>Nosotros</h1>
        <h2>HISTORIA</h2>
        <p>BFA Agro es una empresa fundada el 09 de agosto 2012. Desde entonces ha estado evolucionando y creciendo con
            responsabilidad social en el abastecimiento de productos orgánicos y convencionales para la nutrición y
            Fitosanidad con el campo mexicano, pensando en el beneficio de nuestros agricultores, en la búsqueda
            constante de innovación e importación de fertilizantes de alta calidad y productos de nuevas tecnologías,
            que contribuyan a maximizar la rentabilidad del consumidor final/agricultor, mediante cosechas de alto
            rendimiento, optimizando costo beneficio.</p>
        <p>Comercializa más de 58 diferentes tipos de fertilizantes para abastecer a la agricultura de granos básicos,
            semillas, frutas, verduras y sus derivados, entre otros cultivos.</p>
        <p>BFA Agro a desarrollado una sólida relación comercial con productores y con distribuidores Nacionales,
            buscando siempre las mejores alternativas de suministro en tiempo, costo y calidad para atender las
            necesidades del mercado mexicano. </p>
        <h2>MISIÓN</h2>
        <p>Ser un proveedor con responsabilidad social en el abastecimiento de productos orgánicos y convencionales para
            la nutricion y fitosanidad de los cultivos de importancia económica.</p>
        <p>Trabajar para garantizar la calidad con la misma honestidad e integridad que usamos para crearlos, pensando
            en el beneficio de nuestros agricultores y la salud de los consumidores finales.</p>
        <h2>VISIÓN</h2>
        <p>Ser una empresa que en base a la honestidad e innovación logremos contribuir la mejora del medio ambiente y
            la salud de los consumidores finales de los productos del campo.</p>
        <h2>VALORES</h2>
        <ul>
            <li>Honestidad</li>
            <li>Integridad</li>
            <li>Inovación</li>
            <li>Respeto al medio ambiente</li>
            <li>Respeto a la salud humana</li>
        </ul>
        <div class="row justify-content-end">
            <div class="col-sm-4">
                <img class="pie-logo" src="./img/logo-bfa-agro.svg" alt="Logo BFA Agro S.A. de C.V.">
            </div>
        </div>
    </div>
    <!-- FIN TEXTO -->
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
                        <a href="https://www.facebook.com/BFAAgro-605293486551391" target="_blank"><img id="facebook"
                                src="./img/img_trans.gif"></a>
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