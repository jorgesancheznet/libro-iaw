<?php
function hayCookie(){
    return isset($_COOKIE["nombre"]) && isset($_COOKIE["apellidos"])
        && isset($_COOKIE["fondo"]) && isset($_COOKIE["frente"])
        && isset($_COOKIE["letra"]);
}
function hayGet(){
    return isset($_GET["nombre"]) && isset($_GET["apellidos"])
        && isset($_GET["fondo"]) && isset($_GET["frente"])
        && isset($_GET["letra"]);
}
?>