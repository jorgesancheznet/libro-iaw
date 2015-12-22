<?php
function dibujar($array){
    echo "<table style='border:1px solid black;border-collapse: collapse'>";
    echo "\t<tr style='background-color:black;color:white;border:1px solid black'>\n";
    echo "\t\t<th>Índices</th><th>Valores</th>\n";
    echo "\t</tr>\n";
    foreach($array as $i=>$v){
        echo "\t<tr style='border:1px solid black'>\n";
        echo "\t\t<td style='background-color:gray'>$i</td>";
        echo "\t\t<td>$v</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>


</head>
<body>
<?php
    //Prueba
    $localidades=array("Palencia"=>8000,"Valladolid"=>306000,"Murcia"=>439000,
                       "Albacete"=>170000,"Barcelona"=>160000,"A Coruña"=>25000);
    dibujar($localidades);
    echo "<br>";
    $simbolos=array("Au"=>"Oro","Ag"=>"Plata","Hg"=>"Mercurio","H"=>"Hidrógeno");
    dibujar($simbolos);

?>
</body>
</html>
