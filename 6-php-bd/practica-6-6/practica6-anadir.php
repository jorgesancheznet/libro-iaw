<?php
$id=null;
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
else{
    header("location:practica6-index.php");
}

$mysqli=new mysqli("127.0.0.1", "root", "", "cursos");
if($mysqli){
    $sql="UPDATE cursos ".
        "SET plazas_ocupadas=plazas_ocupadas+1 ".
        "WHERE id_curso=$id";
    if($mysqli->query($sql)==false)
        $error="Fallo al modificar la base de datos";
    else
        $mysqli->close();
}
else{
    $error="No se pudo realizar la conexión con la base de datos";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir</title>
    <link rel="stylesheet" href="practica6-estilos.css"/>
</head>
<body>
<?php
if($error){
    echo "<h1 class='error'>$error</h1>";
}
else{
    header("location:practica6-index.php");
}
?>
</body>
</html>