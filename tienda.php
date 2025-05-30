<?php
session_start();
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
    require_once 'vista/header.php';
    ?>
    <div class="container">
        <div>
            <div class="productos">
            <?php
            require_once(__DIR__ . '/controlador/ProductosController.php');
            $p = new ProductosController();
            $productos = $p->mostrarProductos();
            foreach ($productos as $producto) {
                echo '<div class="producto ' . $producto['id'] . 'p">';
                    echo '<img src="' . $producto['image_url'] . '" alt="Imagen del producto"/>';
                    echo '<h3>' . $producto['name'] . '</h3>';
                    echo '<p>Precio: ' . $producto['price'] . '</p>';
                    echo '<form method="POST" action="añadirAlCarrito.php">';
                        echo '<input type="hidden" name="producto_id" value="' . $producto['id'] . '">';
                        echo '<button type="submit">Añadir al carrito</button>';
                    echo '</form>';
                echo '</div>';
                $contador++;
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    require_once 'vista/footer.php';
    ?>
</body>
</html>