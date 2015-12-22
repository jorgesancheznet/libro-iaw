<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elección de la comunidad autónoma</title>
    <link rel="stylesheet" href="practica1-estilos.css"/>
</head>
<body>
<?php
if(isset($_GET["provincia"])==false){
    header("Location:provincias-practica1.php");
}
else {
    $mysqli = new mysqli("127.0.0.1", "root", "", "geografia");
    if ($mysqli) {
        //hemos recibido la provincia , buscamos sus localidades
        $provincia = $_GET["provincia"];
        $sql = "SELECT l.nombre localidad " .
            "FROM localidades l " .
            "JOIN provincias p USING(n_provincia) " .
            "WHERE p.nombre='$provincia' " .
            "ORDER BY localidad";
        $res = $mysqli->query($sql,MYSQLI_USE_RESULT);
        if ($res) {
            ?>
            <form action="practica1-localidades.php">
                <label for="localidad">Elija la localidad deseada</label>
                <select name="localidad" id="localidad">
                    <?php
                    $fila = $res->fetch_assoc();
                    while ($fila) {
                        echo "<option value='{$fila["localidad"]}'>" .
                            "{$fila["localidad"]}</option>";
                        $fila = $res->fetch_assoc();
                    }
                    ?>
                </select>
                <!-- la provincia la reenviamos como
                control oculto de formulario -->
                <?="<input type='hidden' name='provincia' value='$provincia'/>"?>
                <button>Buscar localidades</button>
            </form>
        <?php
        } else {
            echo "<p class='error'>No se pudo obtener la lista de localidades</p>";
        }
        if (isset($_GET["localidad"])) {
            //hemos recibido una localidad, la buscamos
            // y mostramos los datos
            $localidad = $_GET["localidad"];
            $sql = "SELECT nombre,poblacion FROM localidades " .
                "   WHERE nombre='$localidad'";
            $res = $mysqli->query($sql);
            if ($res->num_rows == 0)
                echo "<p class='error'>No existe la localidad " .
                    "$localidad</p>";
            else {
                $fila = $res->fetch_assoc();
                echo "<p>Localidad $localidad, poblacion= " .
                    $fila["poblacion"] . " habitantes</p>";
            }
        }
    }//fin if de conexión
    else {
        echo "<p class='error'>No se pudo conectar con la base de datos</p>";
    }
}//fin else inicial
?>
</body>
</html>