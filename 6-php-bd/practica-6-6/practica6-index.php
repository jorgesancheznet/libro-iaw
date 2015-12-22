<?php
$error="";
$res=null;
$mysqli=new mysqli("127.0.0.1", "root", "", "cursos");
if($mysqli){
    $sql = "SELECT id_curso,curso,plazas_totales,plazas_ocupadas, ".
        "plazas_totales-plazas_ocupadas as plazas_disponibles ".
        "FROM cursos ORDER BY curso";
    $res=$mysqli->query($sql);
    if(!$res)
        $error="La base de datos no pudo preparar los recursos para mostrar los datos";
}
else{
    $error="No se pudo realizar la conexión con la base de datos";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="practica6-estilos.css"/>
</head>
<body>
<h1>Lista de cursos</h1>
<?php
if($error){
    echo "<p class='error'>$error</p>";
}
else{
    $fila=$res->fetch_assoc();
    echo "<table>";
    echo "<tr><th>Cursos disponibles</th>";
    echo "<th>Plazas totales</th><th>Plazas disponibles</th><th></th></tr>";
    $totales=0;
    $ocupadas=0;
    while($fila){
        $ocupadas+=$fila["plazas_ocupadas"];
        $totales+=$fila["plazas_totales"];
        echo "<tr>";
        $tachado="";
        if($fila["plazas_disponibles"]==0){
            $tachado="class='tachado'";
        }
        echo "<td $tachado>".$fila["curso"]."</td>";
        echo "<td  $tachado>".$fila["plazas_totales"]."</td>";
        echo "<td  $tachado>".$fila["plazas_disponibles"]."</td>";
        echo "<td>";
        if(!$tachado){
            echo "<a href='practica6-anadir.php?id=".$fila["id_curso"].
                    "'>Añadir plaza</a>";
        }
        echo "</td>";
        echo "</tr>";
        $fila=$res->fetch_assoc();
    }
    echo "</table>";
    $res->close();
    $mysqli->close();
}
?>

<h2>Resumen de ocupación:</h2>
<ul>
    <li><strong>Plazas totales ofertadas: </strong><?=$totales?></li>
    <li><strong>Plazas ocupadas: </strong><?=$ocupadas?></li>
    <li><strong>Porcentaje de ocupación: </strong>
        <?=(($ocupadas/$totales)*100)."%"?></li>
</ul>
</body>
</html>