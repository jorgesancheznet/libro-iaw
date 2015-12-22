<?php
    session_start();
if(isset($_SESSION["nombre"]) && isset($_SESSION["hash"])){
    $nombre=$_SESSION["nombre"];
    $hash=$_SESSION["hash"];
    if($nombre!="Jorge" || (password_verify("123456",$hash)==false))
        header("Location:practica3-autentificacion.php");
}
else
    header("Location:practica3-autentificacion.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Práctica 5-3, Acceso restringido</title>
</head>
<body>
    <h1>Página restringida</h1>
</body>
</html>