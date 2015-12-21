<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla ASCII 5 columnas</title>
    <style>
        table{
            width:1000px;
            border-collapse: collapse;
        }
        th{
            background-color:#000000;
            color:#ffffff;
        }
        td{
            text-align:center;
            border:1px solid;
        }
        .codigo{
            background-color: lightgray;
            width:30px;
        }
    </style>
</head>
<body>
<table>

<?php
    //primera fila
    echo "<tr>";
    for($i=1;$i<=8;$i++){
        echo "<th>Código</th><th>Valor</th>";
    }
    echo "</tr>";
    //resto de filas
    echo "<tr>";
    for($i=1;$i<=127;$i++){
        echo "<td class='codigo'>$i</td><td>".chr($i)."</td>";
        if($i%8==0) echo "</tr><tr>";
    }
    echo "</tr>";
?>
</table>
<?php
    echo "<"
?>
</body>
</html>