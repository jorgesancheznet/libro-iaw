<?php
session_start();
//carga del número de aciertos
$aciertos=0;
if(isset($_SESSION["aciertos"]))
    $aciertos=$_SESSION["aciertos"];
$intentos=0;
if(isset($_SESSION["intentos"]))
    $intentos=$_SESSION["intentos"];
//solo con estar en la página contamos el intento
//para evitar que el usuario recargu epara buscar una
//localida más fácil
$intentos=0;
if(isset($_SESSION["intentos"]))
    $intentos=$_SESSION["intentos"];
$_SESSION["intentos"]=++$intentos;



$mysqli = new mysqli("127.0.0.1", "root", "", "geografia");
$error=false;
if ($mysqli) {
    $sql = "SELECT id_localidad, l.nombre as localidad, ".
        "l.n_provincia , p.nombre as provincia ".
        "FROM localidades l, provincias p ".
        "WHERE l.n_provincia=p.n_provincia";
    $res=$mysqli->query($sql);
    if($res) {
        //nos posicionamos en una fila aleatoria
        $res->data_seek(mt_rand(1,$res->num_rows));
        $fila=$res->fetch_assoc();
        $localidad = $fila["localidad"];
        //almacenamos la provincia en la que está la localidad
        $_SESSION["provincia"]= $fila["provincia"];
        //también la propia localidad
        $_SESSION["localidad"]= $fila["localidad"];
        $res->close();
    }
    else
        $error=1;
}
else
    $error=2;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de acertar localidades</title>
    <style>
        p{
            font-size:1.5em;
        }
        select{
            font-size:1em;
        }
    </style>
</head>
<body>
<?=$error?>
<?php if($error==false) { ?>
    <h1>Adivina la provincia</h1>
    <p>Localidad: <strong><?= $localidad ?></strong></p>
    <form action="practica5-comprobar.php">
    <p>
        <select name="provincia" id="provincia">
            <option value=""></option>
            <?php
            //lectura de todas las provincias
            $sql = "SELECT nombre from provincias order by nombre ";
            $res = $mysqli->query($sql);
            $fila=$res->fetch_assoc();
            while ($fila) {
                $provincia=$fila["nombre"];
                echo "<option value='$provincia'>$provincia</option>'";
                $fila=$res->fetch_assoc();
            }
            $res->close();
            ?>
        </select>
    </p>
        <button>Comprobar</button>
    </form>
<?php
    echo "<p> Aciertos=$aciertos, Intentos=$intentos, ".
        "Porcentaje=".($aciertos/$intentos)*100;
    echo "%</p>";
} else {
    echo "<p>No se puede conectar con la base de datos </p>";
}
?>
</body>
</html>