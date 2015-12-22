<?php
include "practica3-errores.php";
if(isset($_POST["id_remite"]) && isset($_POST["texto"])
    && isset($_POST["destinatario"])){
    $id_remite=$_POST["id_remite"];
    $destinatario=$_POST["destinatario"];
    $texto=$_POST["texto"];
    $error=0;
    //búsqueda del destinatario
    $mysqli = new mysqli("127.0.0.1", "root", "", "mensajes");
    if ($mysqli) {
        $sql = "SELECT usuario,id_usuario FROM usuarios " .
            "WHERE usuario='$destinatario'";
        $res=$mysqli->query($sql);
        if($res){
            if($res->num_rows==0)
                $error=ERROR_USUARIO_NO_EXISTE;
            else {
                //el usuario existe, tomamos su id y añadimos el mensaje
                $fila = $res->fetch_assoc();
                $id_destino=$fila["id_usuario"];
                $res->close();
                $texto=$mysqli->real_escape_string($texto);
                $sql="INSERT INTO mensajes(texto,id_remite,id_destino) ".
                    "VALUES ('$texto',$id_remite,$id_destino)";
                if(($mysqli->query($sql))==false)
                    $error=ERROR_GRABAR;
                else
                    $mysqli->close();
            }

        }
        else $error=ERROR_CONEXION;
    }
    else $error=ERROR_CONEXION;

}
else  header("Location:practica3-buzon.php");

if($error!=0);
    //header("Location:practica4-buzon.php?error=".$error);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Mensaje enviado</h1>
<p><a href="practica3-buzon.php">Volver al buzón</a></p>
</body>
</html>