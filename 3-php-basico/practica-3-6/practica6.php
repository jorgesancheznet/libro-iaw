<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla</title>
    <style>
        .error{
            color:red;
        }
        table{
            width:100%;
        }
        td{
            border:1px solid black;
        }
    </style>
</head>
<body>
<form action="practica6.php">
    <label for="columnas">Escriba el número de columnas</label>
    <input type="number" name="columnas" id="columnas" min="1"/><br/>
    <label for="filas">Escriba el número de filas</label>
    <input type="number" name="filas" id="filas" min="1"/><br/>
    <button>Enviar</button>
</form>
<?php
//comprobamos si la página recibe los parámetros para
//dibujar la tabla
if(isset($_GET["filas"]) && isset($_GET["columnas"])){
    $filas=$_GET["filas"];
    $columnas=$_GET["columnas"];
    if(is_numeric($filas) && is_numeric($columnas) &&
        $filas>=1 && $columnas>=1){
        //los datos son correctos, dibujamos la tabla
        echo "<table>";
        for($i=1;$i<=$filas;$i++){
            echo "<tr>";
            for($j=1;$j<=$columnas;$j++) {
                //en cada celda escribimos un espacio en blanco
                //para asegurar que se muestre
                echo "<td>&nbsp;</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "<p class='error'>Número de filas y/o columnas incorrecto</p>";
    }
}

?>
</body>
</html>