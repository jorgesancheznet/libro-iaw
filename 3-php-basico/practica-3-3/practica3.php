<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar número</title>
</head>
<body>
<?php
if(isset($_GET["n"])){//se ha recibido el número
    $n=$_GET["n"];//por comodidad usamos la variable $n
    if(is_numeric($n)){//$n contiene realmente un número
        $resto=$n-(int)$n;//quitamos la parte entera al número
        if($resto==0)
            echo "<h1>El número es entero</h1>";
        else
            echo "<h1>El número es decimal</h1>";
    }
    else{
        echo "<h1>No se ha recibido un número</h1>";
    }
    echo "<a href='form-practica3.html'>Volver</a>";
}
else{
    //no hay número, volvemos al formulario
    header("location:form-practica3.html");
}
?>
</body>
</html>

