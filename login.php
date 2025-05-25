<?php
session_start();
if ($_POST) {
	$usuario = trim(htmlentities($_POST['usuario']));
	$contraseña = trim(htmlentities($_POST['contraseña']));
	
	require_once 'controlador/clientesController.php';
	$p = new clientesController();
	$resultado = $p->iniciarSesion($usuario, $contraseña);
	if ($resultado) {
		$_SESSION['usuario'] = $usuario;
		header('Location: index.php');
	}
	else {
		echo $usuario;
		echo $contraseña;
	}
}
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
<?php
require_once 'vista/header.php';
?>
<form action="" method="POST" id="login">
	<h1>Iniciar Sesión</h1>
	<input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
	<input type="text" name="contraseña" id="contraseña" placeholder="Contraseña">
	<p>¿No tienes cuenta? <a href="registro.php">Registrate</a></p>
	<button type="submit">Iniciar Sesión</button>
</form>
<?php
require_once 'vista/footer.php';
?>
</html>