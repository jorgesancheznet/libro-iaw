<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imagen aleatoria</title>
</head>
<body>
<?php 
$numero=mt_rand(0,1);
if($numero==0){
	echo "<img src='imagen1.jpg'>";
}
else{
	echo "<img src='imagen2.jpg'>";
}
?>
</body>
</html>