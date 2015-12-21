<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mostrar cálculo</title>
	<style>
	.error{
		color:red;
	}
	</style>
</head>
<body>
<?php 
if(isset($_GET["nombre"]) && isset($_GET["apellidos"]) 
	&& isset($_GET["edad"]) && isset($_GET["salario"])){
	$nombre=$_GET["nombre"];
	$apellidos=$_GET["apellidos"];
	$edad=$_GET["edad"];
	$salario=$_GET["salario"];
	if($salario<1000){
		if($edad<30) $salario=1100;
		elseif ($edad<=45) $salario*=1.3;
		else $salario*=1.15;
	}
	elseif($salario<=2000){
		if($edad>45) $salario*=1.03;
		else $salario*=1.1;
	}
	echo "$nombre $apellidos, tu salario será de $salario &euro;";
}
else{
	echo "<p class='error'>Faltan datos</p>";
	echo "<a href='form-practica2.html'>Volver</a>";
}
?>	

</body>
</html>