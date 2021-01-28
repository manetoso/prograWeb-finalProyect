<?php
    require_once('../class/bd.class.php');
    $pag = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
    $regpag=10;
    $ini = ($pag > 1) ? (($pag * $regpag) - $regpag) : 0;
    $regs = $pdo->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM articulos ORDER BY fecha DESC LIMIT '.$ini.','.$regpag);
    $regs->execute();
    $regs = $regs->fetchAll();
    $totRegs = $pdo->query('SELECT FOUND_ROWS() as total');
    $totRegs = $totRegs->fetch()['total'];
    $numPags = ceil($totRegs/$regpag);
?>