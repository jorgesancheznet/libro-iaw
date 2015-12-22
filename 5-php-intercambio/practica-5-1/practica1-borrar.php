<?php
//borra las cookies y nos devuelve al formulario
setcookie("nombre",false);
setcookie("apellidos",false);
setcookie("fondo",false);
setcookie("frente",false);
setcookie("letra",false);
header("location:practica1-index.php");
?>