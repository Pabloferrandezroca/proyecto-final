<?php


require_once(__DIR__ . '/../controlador/ProductosController.php');

?>

<body>
    <div class="container">
        <div>
            <img src="../img/banner.png" alt="Bienvenida">
        </div>
        <div>
            <h2>Productos destacados</h2>
            <div class="productos">
            <?php
            
            $p = new ProductosController();
            $productos = $p->mostrarProductos();
            $contador = 0;
            foreach ($productos as $producto) {
                if ($contador >= 6){
                    break;
                }
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
    require_once 'footer.php';
    ?>
</body>