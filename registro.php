<?php
session_start();
require_once 'controlador/clientesController.php';
if ($_POST) {
    $usuario = trim(htmlentities($_POST['usuario']));
    $email = trim(htmlentities($_POST['email']));
    $contraseña = trim(htmlentities($_POST['contraseña']));
    $contraseña2 = trim(htmlentities($_POST['contraseña2']));
	$errores = [];
	
	if (empty($usuario)) {
		$errores[] = "El nombre du usuario no puede estar vacio";
	}
	if (empty($email)) {
		$errores[] = "El correo electrónico no puede estar vacio";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores[] = "El correo electrónico no es valido";
	}
	if (empty($contraseña)) {
		$errores[] = "La contraseña es obligatoria";
	}
	if ($contraseña !== $contraseña2) {
		$errores[] = "Las contraseñas no coinciden.";
	}

	if (empty($errores)) {
		$c = new clientesController();
		$c->comprobarRegistro($usuario, $email, $contraseña);
		header("Location: login.php");
		exit();
	} else {
		$_SESSION['errores'] = $errores;
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
	<h1>Registrarse</h1>
	<input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
    <input type="email" name="email" id="email" placeholder="Correo electrónico">
	<input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
    <input type="password" name="contraseña2" id="contraseña2" placeholder="Contraseña2">
	<p>¿Ya tienes cuenta? <a href="registro.php">Inicia sesión</a></p>
	<button type="submit">Registrarse</button>
</form>
</html>