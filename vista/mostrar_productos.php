<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../controlador/ProductosController.php';
$p = new ProductosController();
$productos = $p->mostrarProductos();

// Iterar sobre el array asociativo
foreach ($productos as $producto) {
    echo '<div>';
    echo '<img src="' . $producto['image'] . '" alt="Imagen del producto"/>'; // Suponiendo que hay una columna 'imagen'
    echo '<h3>' . $producto['name'] . '</h3>'; // Suponiendo que hay una columna 'nombre'
    echo '<p>Precio: ' . $producto['price'] . '</p>'; // Suponiendo que hay una columna 'precio'
}
?>
