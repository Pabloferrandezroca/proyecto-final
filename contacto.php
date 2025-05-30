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
        <h2>Contacto</h2>
        <form action="" method="POST" id="login">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required cols="60" rows="10"></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
    <?php
    require_once 'vista/footer.php';
    ?>
</body>
</html>