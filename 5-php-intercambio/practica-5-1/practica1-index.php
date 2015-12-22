<?php
include "practica1-comprobar.php";
if(hayCookie()){
    //si tenemos preferencias ya guardadas, directamente vamos al saludo
    header("location:practica1-saludo.php");
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de recogida de preferencias</title>
</head>
<body>
<form action="practica1-saludo.php">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"/><br/>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos"/><br/>
    <label for="fondo">Color de fondo</label>
    <input type="color" name="fondo" id="fondo" value="#FFFFFF"/><br/>
    <label for="frente">Color de letra</label>
    <input type="color" name="frente" id="frente"/><br/>
    <label for="letra">Tipo de letra</label>
    <select name="letra" id="letra">
        <option value="'Shadows Into Light', cursive">
            Shadows Into Light
        </option>
        <option value="'Slabo 27px', serif">Slabo 27px</option>
        <option value="'Roboto', sans-serif">Roboto</option>
    </select><br/>
    <button>Enviar</button>
</form>
</body>
</html>