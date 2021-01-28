<?php
    include ('../class/bd.class.php');
    include ('../class/cat.class.php');
    include ('../class/prod.class.php');
    
    $accion = (isset($_GET["accion"]))?$_GET["accion"]:null;

    switch ($accion) {
        case 'info':
            $datos = [
                'nom' => '',
                'tit' => '',
                'ben' => '',
                'dosi' => '',
                'id_cat' => '',
            ];
            $id_prod = $_GET['id_prod'];
            $nuevoProd->setIdProd($id_prod);
            $datos = $nuevoProd->leerUnProd();
            $datos_pre = $nuevoProd->leerPre($id_prod);
            $datos_cat = $nuevaCat->leerCat();
            include ('../views/prodInfo.view.php');
            break;

        case 'imp':
            $nuevoProd->impProdInfo();
            break;

        case 'cat1':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat1();
            include('../views/prods.view.php');
            break;

        case 'cat2':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat2();
            include('../views/prods.view.php');
            break;

        case 'cat3':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat3();
            include('../views/prods.view.php');
            break;

        case 'cat4':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat4();
            include('../views/prods.view.php');
            break;

        case 'cat5':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat5();
            include('../views/prods.view.php');
            break;

        case 'cat6':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat6();
            include('../views/prods.view.php');
            break;
            
        case 'cat7':
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerCat7();
            include('../views/prods.view.php');
            break;

        default:
            $datos_cat = $nuevaCat->leerCat();
            $datos = $nuevoProd->leerProd();
            include('../views/prods.view.php');
            break;
    }
?>