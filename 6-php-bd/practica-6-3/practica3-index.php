<?
session_start()
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Servicio de mensajeria, entrada</title>
	<link rel="stylesheet" href="practica3-estilos.css">
</head>
<body>
	<h1>Conexión con el servicio de mensajería</h1>
	<div id="izda">
		<h2>Entrar en la cuenta</h2>
		<form action="practica3-login.php" method="POST">
			<input type="text" name="usuario" placeholder="usuario"><br>
			<input type="password" name="password" placeholder="contraseña"><br>
			<button>Validar</button>
		</form>
	</div>
	<div id="dcha">
		<h2>Nuevo usuario </h2>
		<form action="practica3-nuevo.php" method="POST">
			<input type="text" name="usuario" maxlength="30"
				placeholder="usuario" required><br>
			<input type="password" name="password" maxlength="50"
				placeholder="contraseña"><br>
			<input type="password" name="password2" maxlength="50"
				placeholder="Repita contraseña" required><br>
			<button>Alta de usuario</button>
		</form>
	</div>
	<div id="error">
		<?php
        include "practica3-errores.php";
        if(isset($_GET["error"])){
            $error=$_GET["error"];
            //if(isset($mensajeError[$error]))
                echo "<p><strong>Error:</strong> {$mensajeError[$error]}</p>";
        }
        ?>
	</div>
</body>
</html>