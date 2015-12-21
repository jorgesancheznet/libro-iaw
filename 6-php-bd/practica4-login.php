<?php
session_start(); //soporte de sesiones
include "practica4-errores.php";
if(isset($_POST["usuario"]) &&
    isset($_POST["password"]))
{
    //recogemos los parámetros asegurando que cogemos como
    //mucho el máximo tamaño permitido
    $usuario=substr($_POST["usuario"],0,30);
    $password=substr($_POST["password"],0,30);
    if(preg_match("/(*UTF8)^[\p{L}\p{N}]{1,30}$/",$usuario)) {
        if(strlen($password)>=6) {
            $mysqli = new mysqli("127.0.0.1", "root", "Cerrato", "mensajes");
            if ($mysqli) {
                $sql = "SELECT usuario,pass FROM usuarios ".
                        "WHERE usuario='$usuario'";
                $res=$mysqli->query($sql);
                if ($res == false)
                    $error = ERROR_CONEXION;
                else{
                    $fila=$res->fetch_assoc();
                    if($fila){
                        //verificamos contraseña
                        if(password_verify($password,$fila["pass"])){
                            //contraseña correcta, preparamos sesión
                            $_SESSION["usuario"]=$fila["usuario"];
                            $res->close();
                        }
                        else $error=ERROR_USUARIO_PASSWORD;
                    }
                    else $error=ERROR_USUARIO_NO_EXISTE;
                }

            } else $error = ERROR_CONEXION;
        }
        else $error=ERROR_PASSWORD_CORTA;
    }
    else $error=ERROR_USUARIO_INVALIDO;
}
else{
    header("Location:practica4-index.php");
}

//envío de errores al formulario
if($error!=0)
    header("Location:practica4-index.php?error=".$error);
else
    //sin errores, vamos al buzón
    header("Location:practica4-buzon.php");
?>


