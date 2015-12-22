<?php
session_start();
$error=0;
include "practica4-errores.php";
if (isset($_GET["id_mensaje"])==false ||
    isset($_SESSION["usuario"])==false)
    //si no hay sesion de usuario
    // ni se ha pasado id de mensake, vamos al inicio
    header("Location:practica4-index.php");

else {
    //obtenemos id de usuario
    $usuario=$_SESSION["usuario"];
    $mysqli = new mysqli("127.0.0.1", "root", "Cerrato", "mensajes");
    if ($mysqli) {
        $sql = "SELECT usuario,id_usuario FROM usuarios " .
            "WHERE usuario='$usuario'";
        $res=$mysqli->query($sql);
        if($res){
            if($res->num_rows==0)
                //no se ha encontrado al usuario, algo raro pasa
                $error=ERROR_USUARIO_NO_EXISTE;

            else {
                //recogemos el id_usuario
                $fila = $res->fetch_assoc();
                $id_usuario = $fila["id_usuario"];
                //cerramos instrucción, pero la conexión sigue abierta
                $res->close();
            }
        }
        else
            $error=ERROR_CONEXION;
    }
    else
        $error=ERROR_CONEXION;

    //búsqueda del mensaje
    if ($error==0) {
        $id_mensaje = $_GET["id_mensaje"];
        $id_mensaje = $mysqli->real_escape_string($id_mensaje);
        $sql = "SELECT * FROM mensajes " .
            "WHERE id_mensaje=$id_mensaje && id_destino=$id_usuario";
        $res = $mysqli->query($sql);
        if ($res) {
            if ($res->num_rows == 0)
                $error = ERROR_MENSAJE_NOEXISTE;
            else {
                $res->close();
                $sql = "DELETE FROM mensajes WHERE id_mensaje='$id_mensaje'";
                if (($mysqli->query($sql)) == false)
                    $error = ERROR_GRABAR;
                else
                    $mysqli->close();
            }

        } else $error = ERROR_CONEXION;
    } else  $error= ERROR_CONEXION;

    if ($error != 0)
        header("Location:practica4-buzon.php?error=" . $error);
    else
        header("Location:practica4-buzon.php");
}
?>
