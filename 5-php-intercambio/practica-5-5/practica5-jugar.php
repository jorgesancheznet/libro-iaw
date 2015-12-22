<?php
session_start()
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 5-5,Lista de palabras</title>
</head>
<body>
<h1>Recuerda esta lista de palabras</h1>
<?php
include "practica5-lista.php";
shuffle($lista);//revolvemos la lista
//recorremos las cinco primeras palabras y las mostramos
$palabras=array();
for($i=0;$i<5;$i++){
    array_push($palabras,$lista[$i]);
    echo "<h2>".$lista[$i]."</h2>";
}
//las grabamos como sesión
$_SESSION["palabras"]=$palabras;
?>
<script>
window.onload=function()
{
    //salto automático a la siguiente página
    setInterval(function(){location="practica5-formulario.php"},2000);
}
</script>
</body>
</html>