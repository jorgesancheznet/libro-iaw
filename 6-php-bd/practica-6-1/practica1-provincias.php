<?php
if(isset($_GET["comunidad"])==false){
    header("Location:practica1-comunidades.php");
}
else
    $comunidad=$_GET["comunidad"];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elección de la comunidad autónoma</title>
    <link rel="stylesheet" href="practica1-estilos.css"/>
</head>
<body>
<?php
$mysqli=new mysqli("127.0.0.1","root","","geografia");
if($mysqli) {
    $sql="SELECT p.nombre provincia,c.nombre comunidad ".
         "FROM provincias p ".
         "JOIN comunidades c USING(id_comunidad) ".
         "WHERE c.nombre='$comunidad' ".
         "ORDER BY provincia";
    $res=$mysqli->query($sql);
    if($res) {
?>
        <form action="practica1-localidades.php">
            <label for="provincia">Elija la provincia deseada</label>
            <select name="provincia" id="provincia">
                <?php
                $fila=$res->fetch_assoc();
                while($fila){
                    echo "<option value='{$fila["provincia"]}'>".
                        "{$fila["provincia"]}</option>";
                    $fila=$res->fetch_assoc();
                }
                ?>
            </select>
            <button>Buscar localidades</button>
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