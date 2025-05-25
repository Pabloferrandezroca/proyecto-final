<?php
session_start();
$cart = [];
foreach ($_SESSION['carrito'] as  $value) {
	if (isset($cart[$value])) {
		$cart[$value]++;
	} else {
		$cart[$value] = 1;
	}
}
require_once 'controlador/ProductosController.php';
$p = new ProductosController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/fontawesome/css/all.min.css">
</head>
<body>
    <?php
    require_once('vista/header.php');
    ?>
    <div class="container">
        <div class="productos">
        <?php
        foreach ($cart as $id => $cantidad) {
            $producto = $p->obtenerCarrito($id);
            if ($producto) {
                echo '<div class="producto ' . $producto['id'] . 'p">';
                    echo '<img src="' . $producto['image_url'] . '" alt="Imagen del producto"/>';
                    echo '<h3>' . $producto['name'] . '</h3>';
                    echo '<p>Precio: ' . $producto['price'] . '</p>';
                    echo '<p>Cantidad: ' . $cantidad . '</p>';
                    echo '<form method="POST" action="añadirAlCarrito.php">';
                        echo '<input type="hidden" name="producto_id" value="' . $producto['id'] . '">';
                        echo '<button type="submit">Añadir 1 mas</button>';
                        echo '<button class="eliminar" type="submit" name="eliminar" value="' . $producto['id'] . '">Eliminar</button>';
                    echo '</form>';
                echo '</div>';
            }
        }
        if (empty($cart)) {
            echo "<h2>No hay ningun producto en el carrito<a href=index.php>Añadir Productos</a></h2>";
        }
        if (isset($_SESSION['usuario'])) {
            echo "<button class='pagar'><a href='pagar.php'>Pagar</a></button>";
        }
        else {
            echo "<h2>Inicia sesión para pagar</h2>";
        }
        ?>
        </div>
    </div>
    <?php
    require_once('vista/footer.php');
    ?>
</body>
</html>