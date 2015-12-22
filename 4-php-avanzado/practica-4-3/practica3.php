<?php
//cálculo de las 10 primeras franjas
//el array contendrá 10 capas(div) usando
//el atributo style con el color aleatorio
//de cada franja
$arraycolor=array();
for($i=0;$i<10;$i++){
    $rojo=mt_rand(0,255);
    $verde=mt_rand(0,255);
    $azul=mt_rand(0,255);
    $arraycolor[$i]="background-color:rgb($rojo,$verde,$azul)";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Franjas aleatorias</title>
    <style>
        div{
            position:fixed;
            width:100%;
            height:1%;
        }
        body{
            margin:0;
            font-size:1px;
        }
    </style>
</head>
<body>
<?php
//escribimos cada franja 10 veces
$top=0;
for($i=1;$i<=10;$i++){
    foreach($arraycolor as $j=>$color){
        //Esta es la línea más compleja:
        //$color coloca el código de color de cada capa
        //$top% => va subiendo la coordenada vertical de cada capa
        //         de 1 en 1 en %
        echo "<div style='$color;top:$top%;'></div>";
        $top++;
    }
}
?>
</body>
</html>