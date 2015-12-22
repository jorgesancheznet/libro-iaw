<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4-10, Combinaciones primitiva</title>
</head>
<body>
<?php
for($i=0;$i<49;$i++){
    $numeros[$i]=$i;
}
for($i=1;$i<=100;$i++){
    shuffle($numeros); //reordena el array de forma aleatoria
    echo "<p>Combinación $i: ";
    for($j=0;$j<6;$j++){
        echo $numeros[$j]." ";
    }
    echo "</p>";
}
?>
</body>
</html>