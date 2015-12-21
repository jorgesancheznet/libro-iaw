<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{
            width:500px;
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
    <tr><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th><th>Código</th>
        <th>Valor</th><th>Código</th><th>Valor</th><th>Código</th><th>Valor</th>
    </tr>
<?php
    for($i=1,$col=1;$i<=50000;$i++,$col++){
        if($col==6) $col=1;
        if($col==1) echo "<tr>";
        echo "<td class='codigo'>$i</td><td>"."&#".$i."</td>";
        if($col==5) echo "</tr>";
    }
?>
</table>
</body>
</html>