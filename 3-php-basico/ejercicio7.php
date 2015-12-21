<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pagina de resultado-Ejercicio 7</title>
</head>
<body>
<form action="#">
	<?php
		if(isset($_GET["n"])){
			for($i=1;$i<=$_GET["n"];$i++){
				echo "<label for='n$i'>Escriba el número $i</label>";
				echo "<input type='text' name='n$i' id='n$i'><br>";
			}
		}
	?>
</form>	
</body>
</html>