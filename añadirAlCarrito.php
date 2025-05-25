<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (isset($_POST['eliminar'])) {
    $producto_id = filter_var($_POST['eliminar'], FILTER_VALIDATE_INT);
    if ($producto_id) {
        $key = array_search($producto_id, $_SESSION['carrito']);
        if ($key !== false) {
            unset($_SESSION['carrito'][$key]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
if ($_POST && $_POST['producto_id']) {
    if (!is_array($_SESSION['carrito']) || isset($_SESSION['carrito']) === false) {
        $_SESSION['carrito'] = [];
    }
    $producto_id = filter_var($_POST['producto_id'], FILTER_VALIDATE_INT);
    if ($producto_id) {
        array_push($_SESSION['carrito'], $producto_id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
foreach ($_SESSION['carrito'] as $key => $value) {
    echo $value;
}


?>