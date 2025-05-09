<?php


require_once(__DIR__ . '/../controlador/ProductosController.php');

?>

<body>
    <div class="container">
        <div>
            <img src="../img/banner2.png" alt="Bienvenida">
        </div>
        <div>
            <h2>Productos destacados</h2>
            <div class="productos">
            <?php
            
            $p = new ProductosController();
            $productos = $p->mostrarProductos();
            foreach ($productos as $producto) {
                echo '<div class="producto ' . $producto['id'] . 'p">';
                    echo '<img src="' . $producto['image_url'] . '" alt="Imagen del producto"/>';
                    echo '<h3>' . $producto['name'] . '</h3>';
                    echo '<p>Precio: ' . $producto['price'] . '</p>';
                    echo '<button>Añadir al carrito</button>';
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
</body>