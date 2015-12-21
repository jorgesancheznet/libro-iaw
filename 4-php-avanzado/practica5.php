<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validar datos personales</title>
	<style>
	.error{
		color:red;
	}
	</style>
</head>
<body>
	<?php 
		$todoBien=true;
		if(isset($_POST["nombre"]) && isset($_POST["apellido1"])
			&& isset($_POST["apellido2"]) && isset($_POST["nif"])
			&& isset($_POST["usuario"]) && isset($_POST["telefono"])){
				$nombre=$_POST["nombre"];
				$apellido1=$_POST["apellido1"];
				$apellido2=$_POST["apellido2"];
				$nif=$_POST["nif"];
				$usuario=$_POST["usuario"];
				$telefono=$_POST["telefono"];
				$letrasValidas="A-Za-záéíóúüÁÉÍÓÚÜñÑ";
				if(preg_match("/^[$letrasValidas\- ]+$/",$nombre)==false){
					echo "<p class='error'>Nombre no válido</p>";
					$todoBien=false;
				}
				if(preg_match("/^[$letrasValidas\- ]+$/",$apellido1)==false){
					echo "<p class='error'>Primer apellido no válido</p>";
					$todoBien=false;
				}
				if(preg_match("/^[$letrasValidas\- ]+$/",$apellido2)==false){
					echo "<p class='error'>Segundo apellido no válido</p>";
					$todoBien=false;
				}
				if(preg_match("/^[$letrasValidas][{$letrasValidas}0-9]+$/",$usuario)==false){
					echo "<p class='error'>Usuario no válido</p>";
					$todoBien=false;
				}
				if(preg_match("/^[0-9]{9}$/",$telefono)==false){
					echo "<p class='error'>Teléfono no válido</p>";
					$todoBien=false;
				}
				if(preg_match("/^[0-9XYZ][0-9]{7}[A-Z]$/",$nif)==false){
					echo "<p class='error'>NIF no válido</p>";
					$todoBien=false;
				}				
				else{
					if($nif[0]=="X") $nif[0]="0";
					elseif($nif[0]=="Y") $nif[0]="1";
					elseif($nif[0]=="Z") $nif[0]="2";
					$numerosNIF=substr($nif, 0,8);
					$letras="TRWAGMYFPDXBNJZSQVHLCKE";
					$resto=$numerosNIF%23;
					if($nif[8]!=$letras[$resto]){
						echo "<p class='error'>Letra de NIF incorrecta</p>";
						$todoBien=false;
					}
				}
				if($todoBien==true){
					echo "<p>Datos correctos</p>";
				}
		}
		else{
			echo "<p class='error'>Faltan datos</p>";
		}
	?>
	<a href="form-practica5.html">Volver al formulario</a>
</body>
</html>