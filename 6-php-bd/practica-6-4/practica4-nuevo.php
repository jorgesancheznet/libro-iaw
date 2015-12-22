<?php
session_start(); //soporte de sesiones
include "practica4-errores.php";
$error=0;//centinela de errores
if(isset($_POST["usuario"]) &&
    isset($_POST["password"]) &&
    isset($_POST["password2"]))
{
    //recogemos los parámetros asegurando que cogemos como
    //mucho el máximo tamaño permitido
    $usuario=substr($_POST["usuario"],0,30);
    $password=substr($_POST["password"],0,30);
    $password2=substr($_POST["password2"],0,30);
    if(preg_match("/(*UTF8)^[\p{L}\p{N}]{1,30}$/",$usuario)) {
        if ($password == $password2) {
            if(strlen($password)>=6) {
                $mysqli = new mysqli("127.0.0.1", "root", "Cerrato", "mensajes");
                if ($mysqli) {
                    $cifrada = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios(usuario,pass) " .
                        "VALUES('$usuario','$cifrada')";
                    if ($mysqli->query($sql) == false) {
                        if($mysqli->errno==1062) //código de índice duplicado
                            $error=ERROR_USUARIO_EXISTE;
                        else
                            $error = ERROR_GRABAR;
                    }
                    else
                        $_SESSION["usuario"] = $usuario;
                } else $error=ERROR_CONEXION;
            }
            else $error=ERROR_PASSWORD_CORTA;
        }
        else $error=ERROR_DOS_PASSWORD;
    }
    else $error=ERROR_USUARIO_INVALIDO;
}
else{
    header("Location:practica4-index.php");
}
if($error!=0)
    header("Location:practica4-index.php?error=".$error);
else
    header("Location:practica4-buzon.php");
?>