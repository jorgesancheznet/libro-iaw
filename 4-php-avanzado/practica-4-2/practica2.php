<?php
$listaEquipos=array(
    "F.C. Barcelona"=>94,
    "Real Madrid"=>92,
    "Atlético Madrid"=>78,
    "Valencia"=>77,
    "Sevilla"=>76,
    "Villarreal"=>60,
    "Málaga"=>50,
    "Espanyol"=>49,
    "Athlétic Bilbao"=>55,
    "Celta"=>51,
    "Real Sociedad"=>46,
    "Rayo Vallecano"=>49,
    "Getafe"=>37,
    "Eibar"=>35,
    "Elche"=>41,
    "Deportivo"=>35,
    "Almería"=>29,
    "Levante"=>37,
    "Granada"=>35,
    "Córdoba"=>20
);

arsort($listaEquipos);//ordeno la lista de equipos por puntos
//el array clasificacion contendrá la lista ordenada de equipos por puntos
//pero no almacena los puntos en sí
$clasificacion=array_keys($listaEquipos);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clasificación</title>
</head>
<body>
<form action="practica2.php" method="post">
    <label for="equipo">Elija el equipo</label>
    <select name="equipo" id="equipo">
    <?php
    //Ordenamos el array para que el cuadro combinado
    //muestre los equipos en orden alfabético
    ksort($listaEquipos);
    foreach($listaEquipos as $nombre=>$p){
        echo "<option value='$nombre'>$nombre</option>";
    }
    ?>
    </select><br/>
    <button>Comprobar</button>
    <?php
    if(isset($_POST["equipo"])){
        $equipo=$_POST["equipo"];
        /*  comprobamos si el equipo existe, de ser así, tomamos los puntos
            y buscamos su posición en clasificación
            Podría no existir si alguien manipula los parámetros
        */
        if(isset($listaEquipos[$equipo])){
            $puntos=$listaEquipos[$equipo];
            $posicion=array_search($equipo,$clasificacion)+1;
            echo "<p>El $equipo tiene $puntos puntos, ".
                "ahora mismo es el $posicion"."º en la clasificación ".
                "</p>";
        }
        else{
            echo "<p>Equipo innexistente.".
                " Has intentado liarme</p>";
        }
    }
    ?>
</form>
</body>
</html>