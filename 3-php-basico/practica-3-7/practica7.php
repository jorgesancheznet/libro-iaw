<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>5 columnas</title>
    <style>
        td{
            border:1px solid black;
        }
    </style>
</head>
<body>
<table>
    <tr> <!-- apertura de primera fila -->
<?php
for($i=1;$i<=1000;$i++){
    echo "<td>$i</td>";
    if($i%5==0) echo "</tr><tr>"; //a la quinta cambiamos de fila
}
?>
    </tr>  <!-- cierre de la última fila -->
</table>
</body>
</html>