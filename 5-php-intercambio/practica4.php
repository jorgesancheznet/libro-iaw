<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Practica 5.4, Lista de tareas</title>
</head>
<body>
<form action="practica4.php">
    <label for="tarea">Añadir tarea</label>
    <input type="text" name="tarea" id="tarea">
    <button>Añadir</button>
</form>
<?php
$tareas=array();
//lectura del array si existe la cookie correspondiente
if(isset($_COOKIE["tareas"])){
    $tareas=unserialize($_COOKIE["tareas"]);
}
//comprobar si se ha enviado una nueva tarea
if(isset($_GET["tarea"]) && strlen(trim($_GET["tarea"]))>0){
    //añadir nueva tarea
    $tarea=$_GET["tarea"];
    array_push($tareas,$tarea);
}
//comprobar si se ha enviado para borrar un índice de tarea
if(isset($_GET["borrar"])){
    //borrar tarea
    $idTarea=$_GET["borrar"];
    array_splice($tareas,$idTarea,1);
}
//escribir tareas;
if(count($tareas)>0)
    echo "<h2>Lista de tareas</h2>";
echo "<ol>";
foreach($tareas as $idTarea=>$tarea){
    echo "<li>$tarea <a href='practica4.php?borrar=$idTarea'>Borrar</a></li>";
}
echo "</ol>";
//grabado del array actual
setcookie("tareas",serialize($tareas));
?>
</body>
</html>