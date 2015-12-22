<?php
session_start();
include "practica3-errores.php";
if(isset($_SESSION["usuario"])==false)
    //si no hay sesion de usuario vamos al formulario
    header("Location:practica3-index.php");
else
    //buscamos a ver si ese usuario existe
    $usuario=$_SESSION["usuario"];
$mysqli = new mysqli("127.0.0.1", "root", "", "mensajes");
if ($mysqli) {
    $sql = "SELECT usuario,id_usuario FROM usuarios " .
        "WHERE usuario='$usuario'";
    $res=$mysqli->query($sql);
    if($res){
        if($res->num_rows==0)
            //no se ha encontrado al usuario, algo raro pasa
            //devolvemos el flujo al formulario de entrada
            header("Location:formulario3-index.php");
        else {
            //recogemos el id_usuario
            $fila = $res->fetch_assoc();
            $id_usuario = $fila["id_usuario"];
            //cerramos instrucción, pero la conexión sigue abierta
            $res->close();
        }
    }
    else
        header("Location:index-practica3.php?error=".ERROR_CONEXION);
}
else
    header("Location:index-practica3.php?error=".ERROR_CONEXION);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buzón de mensajes</title>
    <link rel="stylesheet" href="practica3-estilos.css"/>
</head>
<body>
<h1>Hola <?=$usuario?></h1>
<div id="izda">
    <h2>Lista de mensajes</h2>
    <?php
    //a la izquierda mostramos la lista de mensajes
    //buscamos los mensajes del usuario
    $sql="SELECT usuario remite,texto FROM mensajes ".
        "JOIN usuarios ON(id_usuario=id_remite) ".
        "WHERE id_destino=$id_usuario  ORDER BY id_mensaje DESC";
    $res=$mysqli->query($sql);
    if($res){
        if($res->num_rows==0)
            echo "<p><strong>No hay mensajes</strong></p>";
        else{
            $fila=$res->fetch_assoc();
            echo "<ul>";
            while($fila){
                echo "<li><strong>De: </strong>{$fila["remite"]}<br>";
                echo $fila["texto"]."</li>";
                $fila=$res->fetch_assoc();
            }
            $res->close();
            echo "</ul>";
        }
    }
    ?>
</div>
<div id="dcha">
    <h2>Nuevo mensaje</h2>
    <form action="practica3-enviar.php" method="POST">
        <input type="text" name="destinatario" maxlength="30"
               placeholder="Destinatario" required><br>
        <!--de manera oculta pasamos el id_usuario como remite del mensaje-->
        <input type="hidden" name="id_remite" value="<?=$id_usuario?>"/>
        <textarea name="texto" id="texto" cols="30" rows="10"
                  placeholder="Texto del mensaje"></textarea><br/>
        <button>Enviar mensaje</button>
    </form>
</div>
<div id="error">
    <?php
    if(isset($_GET["error"])){
        $error=$_GET["error"];
        //if(isset($mensajeError[$error]))
        echo "<p><strong>Error:</strong> {$mensajeError[$error]}</p>";
    }
    ?>
</div>
<div id="cerrar">
    <p><a href="practica3-cerrar.php">Cerrar sesión</a></p>
</div>
</body>
</html>