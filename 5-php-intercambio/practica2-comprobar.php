<?php
function haySesion(){
    return isset($_SESSION["nombre"]) && isset($_SESSION["apellidos"])
    && isset($_SESSION["fondo"]) && isset($_SESSION["frente"])
    && isset($_SESSION["letra"]);
}
function hayGet(){
    return isset($_GET["nombre"]) && isset($_GET["apellidos"])
    && isset($_GET["fondo"]) && isset($_GET["frente"])
    && isset($_GET["letra"]);
}
?>
