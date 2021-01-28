<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/box-heading-bg.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="../styles/bootstrap.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/procesoProdG.css">
    <link rel="stylesheet" href="../styles/prodInfo.view.css">
    <title>Agroquímica BFA Agro</title>
</head>
<body>
     <!-- INICIO NAVBAR -->
     <header class="container">
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
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Productos</a>
                        <div class="dropdown-menu">
                        <?php foreach ($datos_cat as $resultado=>$fila){ ?>
                                <a class="dropdown-item" href="procesoProdG.php?accion=cat<?php echo($fila['id_cat']); ?>"><?php echo ($fila['descr']) ?></a>
                            <?php } ?>
                            <small class="form-text text-muted">---------------------------------------------------------------------------------------------------------------------------------</small>
                            <a class="dropdown-item" href="procesoProdG.php">Todos los productos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./procesoBlog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./procesoContacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="../login/formLogin.php" class="btn btn-success my-2 my-sm-0" type="submit">Login</a>
                </form>
            </div>
        </nav>
    </header>
    <!-- FIN NAVBAR -->
    <!-- INICIO INFO PRODUCTOS -->
    <div class="container" id="top-contenedor">
        <div class="row">
            <div class="col-md-4">
                <img 
                    src="../fotos/prod/<?php echo($datos['foto']) ?>"
                    alt="Foto del producto"
                    class="rounded"
                    width="100%"
                >
            </div>
            <div class="col-md-8 mt-5">
                <h1><?php echo($datos['nom']) ?></h1>
                <hr>
                <p><?php echo($datos['tit']) ?></p>
                <hr>
                <div id="catProd">
                    <h6>Este producto pertenece a la categoría de:</h6>
                    <p class="pl-3">
                        <?php
                            foreach ($datos_cat as $resu=>$fila){
                                if ($datos['id_cat'] == $fila['id_cat']){
                                    echo($fila['descr']);
                                }
                            }
                        ?>
                    </p>
                </div>
                <hr>
                <h6>Puedes encontrar este producto en cualquiera de sus siguientes presentaciones:</h6>
                <div class="container-fluid">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr class="table-success">
                                <th scope="col" class="text-center">Presentación</th>
                                <th scope="col" class="text-center">Presio unitario por envase o bolsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos_pre as $resu=>$fila){ ?>
                            <tr class="table-success">
                                <td class="text-center"><?php echo($fila['descr']) ?></td>
                                <td class="text-center">$<?php echo($fila['pu']) ?>/envase o bolsa</td>
                            </tr>
                            <?php } ?>
                        </tbody>  
                        </table>
                </div>
                <div class="row justify-content-end mb-1">
                    <div class="form-group">
                        <a href="procesoProdG.php?accion=imp&id_prod=<?php echo($id_prod); ?>" target="_blank" name="enviar" class="btn btn-outline-primary">Imprimir información de éste producto</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-1 mb-4">
        <div id="container-ben-dosi">
            <ul class="nav nav-tabs justify-content-center" id="ben-dosi">
                <li class="nav-item">
                    <a href="#ben" class="nav-link active" data-toggle="tab">Beneficios</a>
                </li>
                <li class="nav-item">
                    <a href="#dosi" class="nav-link" data-toggle="tab">Dosis</a>
                </li>
            </ul>
            <div class="tab-content ml-3 mr-3 mt-3">
                <div class="tab-pane fade show active" id="ben">
                    <p><?php echo($datos['ben']) ?></p>
                </div>
                <div class="tab-pane fade" id="dosi">
                    <p><?php echo($datos['dosi']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN INFO PRODUCTOS -->
    <!-- INICIO FOOTER -->
    <footer class="pie-de-pag mt-5">
        <div class="container">
            <div class="pie-logo text-center">
                <a href="index.html"><img src="../img/logo-bfa-agro.svg" alt=""></a>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Redes sociales</h2>
                    <p>Puedes encontrarnos en nuestras diferentes redes sociales también</p>
                    <div class="col-sm">
                        <a href="https://www.facebook.com/BFAAgro-605293486551391" target="_blank"><img id="facebook"
                                src="../img/img_trans.gif"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>Atención a clientes</h2>
                    <ul>
                        <li><a class="pie-lista" href="./procesoContacto.php">Contacto</a></li>
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