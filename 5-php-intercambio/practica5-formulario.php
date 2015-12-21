<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 5-5, Formulario</title></head>
<body>
<h1>Escriba las palabras de las que te acuerdas</h1>

<form action="practica5-resultados.php">
<?php
    for($i=0;$i<5;$i++) {
        echo "<label for='result$i'>Palabra ".($i+1)."</label>";
        echo "<input type='text' name='result[]' id='result$i'><br>";
    }
?>
    <button>Comprobar</button>
</form>
</body>
</html>