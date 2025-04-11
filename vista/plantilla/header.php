<?php
session_start();
$origen = debug_backtrace();
$archivo = basename($origen[0]['file']);
?>
<header>
    <div class="container-izquierda">
        <img src="../../img/descarga.jpeg" alt="logo" class="logo">
        <h1>JardinBrillante</h1>
        <nav>
            <ul>
                <li>
                    <?php
                    if ($archivo === 'index.php') {
                        echo '<strong>Inicio</strong>';
                    } else {
                        echo '<a href="index.php">Inicio</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        if ($archivo === 'vista/vista_productos.php') {
                            echo '<strong>Productos</strong>';
                        } else {
                            echo '<a href="vista/vista_productos.php">Productos</a>';
                        }
                    } else {
                        if ($archivo === 'vista/inciar_sesion.php') {
                            echo '<strong>Iniciar Sesion</strong>';
                        } else {
                            echo '<a href="vista/iniciar_sesion.php">Iniciar Sesion</a>';
                        }
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if ($archivo === 'vista/consejos.php') {
                        echo '<strong>Consejos de Jardineria</strong>';
                    } else {
                        echo '<a href="vista/consejos.php">Consejos de Jardineria</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if ($archivo === 'vista/sobre_nosotros.php') {
                        echo '<strong>Sobre nosotros</strong>';
                    } else {
                        echo '<a href="vista/sobre_nosotros.php">Sobre nosotros</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if ($archivo === 'vista/contacto.php') {
                        echo '<strong>Contacto</strong>';
                    } else {
                        echo '<a href="vista/contacto.php">Contacto</a>';
                    }
                    ?>
                </li>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<li><a href="vista/cerrar_sesion.php">Cerran Sesion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="container-derecha">
        <i class="fa-solid fa-cart-shopping"></i>
        <form action="#" method="get">
            <input type="text" name="buscador" id="buscador" placeholder="Buscar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</header>