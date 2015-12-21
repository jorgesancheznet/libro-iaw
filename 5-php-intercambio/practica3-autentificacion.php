<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Practica 5.3, Autenticación</title>
</head>
<body>
<form action="practica3-autentificacion.php" method="POST" id="form1">
    <label for="nombre">Nombre de usuario</label>
    <input type="text" name="nombre" id="nombre"><br>
    <label for="contra">Contraseña</label>
    <input type="password" name="contra" id="contra">
    <button id="envio">Comprobar</button>
</form>

<?php
if(isset($_POST["nombre"]) && isset($_POST["contra"])){
    $nombre=$_POST["nombre"];
    $contra=$_POST["contra"];
    if($nombre=="Jorge" && $contra=="123456") {
        $_SESSION["nombre"]=$nombre;
        $_SESSION["hash"]=password_hash($contra,PASSWORD_DEFAULT);
        header("Location:practica3-restringida.php");
    }
    else
        echo "<h1>Datos incorrectos</h1>";
}
?>
</body>
</html>