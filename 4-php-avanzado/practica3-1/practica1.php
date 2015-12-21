<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de compra</title>
</head>
<body>
<h1>Artículos comprados</h1>
<?php
if(isset($_POST["articulo"])){
    $articulo=$_POST["articulo"];
    if(is_array($articulo)){
        echo "<ul>";
        $suma=0;
        foreach($articulo as $nombre=>$valor){
            echo "<li>$nombre, precio: $valor &euro;</li>";
            $suma+=$valor;
        }
        echo "</ul>";
        echo "<p><strong>Total: $suma &euro;</strong></p>";
    }
    else{
        echo "<p>Los datos no se han enviado correctamente</p>";
    }
}
else{
    echo "<p>No se han comprado artículos</p>";
}
?>
</body>
</html>