<?php
session_start();
include "practica2-comprobar.php";
$hayPreferencias=true;
$array=null;
if(haySesion()==false){
    if(hayGet()==false){
        $hayPreferencias=false;
    }
    else{
        $array=$_GET;
    }
}
else{
    $array=$_SESSION;
}
if($hayPreferencias==false) header("location:practica2-index.php");
else{
    //recorro el array donde están los datos
    foreach($array as $indice=>$valor){
        $$indice=$valor;
    }
    //grabar datos de la sesión
    $_SESSION["nombre"]=$nombre;
    $_SESSION["apellidos"]=$apellidos;
    $_SESSION["fondo"]=$fondo;
    $_SESSION["frente"]=$frente;
    $_SESSION["letra"]=$letra;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo</title>
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Slabo+27px|Roboto' rel='stylesheet' type='text/css'>
    <style>
        body{
            background-color:<?=$fondo?>;
            color:<?=$frente?>;
            font-family:<?=$letra?>;
        }
        a{
            background-color:white;
        }
    </style>
</head>
<body>
<h1>Hola <?="$nombre $apellidos"?></h1>
<p><a href="practica2-borrar.php">Volver a cambiar las preferencias</a></p>
</body>
</html>