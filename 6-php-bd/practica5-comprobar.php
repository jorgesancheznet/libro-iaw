<?php
session_start();
if( !isset($_GET["provincia"]) ||
    !isset($_SESSION["localidad"]) ||
    !isset($_SESSION["provincia"]))
        header("Location:practica5-index.php");
else{
    $localidad=$_SESSION["localidad"];
    $provincia_resp=$_GET["provincia"];
    $provincia_acierto=$_SESSION["provincia"];
}
//carga del número de aciertos
$aciertos=0;
$acierto=true;
if(isset($_SESSION["aciertos"]))
    $aciertos=$_SESSION["aciertos"];

if($provincia_resp==$provincia_acierto)
    $_SESSION["aciertos"]=++$aciertos;
else{
    $acierto=false;
}
if(isset($_SESSION["intentos"]))
    $intentos=$_SESSION["intentos"];

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobación, práctica 5</title>
</head>
<body>
<?php
if($acierto) {
    echo "<h1>¡Has acertado! $localidad está en $provincia_resp</h1>";
} else{
    echo "<h1>¡Fallaste! $localidad No está en $provincia_resp</h1>";
    echo "<p>Realmente está en $provincia_acierto</p>";
}
echo "<p> Aciertos=$aciertos, Intentos=$intentos, ".
    "Porcentaje=".($aciertos/$intentos)*100;
echo "%</p>";
?>
<a href="practica5-index.php">Volver a jugar</a>
</body>
</html>
