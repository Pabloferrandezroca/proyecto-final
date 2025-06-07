<?php
session_start();
$origen = debug_backtrace();
$archivo = basename($origen[0]['file']);
?>
<header>
    <div class="container-izquierda">
        <img src="../../img/logo.png" alt="logo" class="logo">
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
                    if ($archivo === 'tienda.php') {
                        echo '<strong>Tienda</strong>';
                    } else {
                        echo '<a href="tienda.php">Tienda</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                        if ($archivo === 'login.php') {
                            echo '<strong>Iniciar Sesión</strong>';
                        }else {
                            echo '<a href="login.php">Iniciar Sesión</a>';
                        }
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                        if ($archivo === 'registro.php') {
                            echo '<strong>Registrarse</strong>';
                        } else {
                            echo '<a href="registro.php">Registrarse</a>';
                        }
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if ($archivo === 'consejos.php') {
                        echo '<strong>Consejos de Jardineria</strong>';
                    } else {
                        echo '<a href="consejos.php">Consejos de Jardineria</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if ($archivo === 'contacto.php') {
                        echo '<strong>Contacto</strong>';
                    } else {
                        echo '<a href="contacto.php">Contacto</a>';
                    }
                    ?>
                </li>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<li><a href="cerrar_sesion.php">Cerran Sesion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="container-derecha">
        <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
        <form action="#" method="get">
            <input type="text" name="buscador" id="buscador" placeholder="Buscar">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</header>