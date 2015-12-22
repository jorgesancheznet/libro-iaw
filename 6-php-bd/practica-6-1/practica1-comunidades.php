
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elección de la comunidad autónoma</title>
    <link rel="stylesheet" href="practica1-estilos.css"/>
</head>
<body>
<?php
//conexión a  la base de datos, la haremos de
// tipo persistente por eso no la cerramos
$mysqli=new mysqli("127.0.0.1","root","","geografia");
if($mysqli) {
    $res=$mysqli->query("SELECT nombre FROM comunidades ORDER BY nombre");
    if($res) {
?>
        <form action="practica1-provincias.php">
            <label for="comunidad">Elija la comunidad deseada</label>
            <select name="comunidad" id="comunidad">
                <?php
                $fila=$res->fetch_assoc();
                while($fila){
                    echo "<option value='{$fila["nombre"]}'>".
                        "{$fila["nombre"]}</option>";
                    $fila=$res->fetch_assoc();
                }
                ?>
            </select>
            <button>Buscar provincias</button>
        </form>
<?php
    }
    else{
        echo "<p class='error'>No se pudo obtener la lista de provincias</p>";
    }
}
else{
    echo "<p class='error'>No se pudo conectar con la base de datos</p>";
}
?>
</body>
</html>