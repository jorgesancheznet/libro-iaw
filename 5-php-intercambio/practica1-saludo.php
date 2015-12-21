<?php
include "practica1-comprobar.php";
//nos dice si tenemos preferencias de usuario
$hayPreferencias=true;
//accede al array, sea GET o POST con las preferencias
$array=null;
if(hayCookie()==false){
    if(hayGet()==false){
        $hayPreferencias=false;
    }
    else{
        $array=$_GET;
    }
}
else{
    $array=$_COOKIE;
}
if($hayPreferencias==false)
    //si no tenemos preferencias, volvemos al formulario
    header("location:practica1-index.php");
else{
    //Recorremos el array con los datos de usuario
    //y creamos una variable con cada nombre de preferencia
    foreach($array as $indice=>$valor){
        $$indice=$valor;
    }
    //grabar cookies con las preferencias de usuario
    setcookie("nombre",$nombre,time()*60*60*24*30);
    setcookie("apellidos",$apellidos,time()*60*60*24*30);
    setcookie("fondo",$fondo,time()*60*60*24*30);
    setcookie("frente",$frente,time()*60*60*24*30);
    setcookie("letra",$letra,time()*60*60*24*30);
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

<p><a href="practica1-borrar.php">Volver a cambiar las preferencias</a></p>
</body>
</html>