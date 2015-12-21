<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Práctica 4.6, Formulario César</title>
	<style>
		.error{
			color:red;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_POST["texto"]) && isset($_POST["clave"]) && isset($_POST["opcion"])){
			$texto=$_POST["texto"];
			$clave=$_POST["clave"];
			$opcion=$_POST["opcion"];
			if(strlen($texto)<10) {
				echo "<p class='error'>El texto debe de ser más largo</p>";
			}
			elseif($clave<1 || $clave>99){
				echo "<p class='error'>La clave debe de ser un número entre 1 y 99</p>";
			}
			else{
				//todo correcto se procede al cifrado
				if($opcion=="d") $clave=-$clave;
				$aux="";
				for ($i=0; $i <strlen($texto) ; $i++) {
					$aux.=chr(ord($texto[$i])+$clave);
				}
				echo "<p>El texto cifrado es</p><blockquote>$aux</blockquote>";
			}
		}
		else{
			echo "<p class='error'>Falta información</p>";
		}
	 ?>
	<a href="practica6.html">Volver a cifrar</a>
</body>
</html>