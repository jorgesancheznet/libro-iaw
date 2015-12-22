<?php 
//constantes para errores
const ERROR_CONEXION=1;
const ERROR_DOS_PASSWORD=2;
const ERROR_USUARIO_EXISTE=4;
const ERROR_USUARIO_NO_EXISTE=8;
const ERROR_USUARIO_PASSWORD=16;
const ERROR_USUARIO_INVALIDO=32;
const ERROR_GRABAR=64;
const ERROR_PASSWORD_CORTA=128;
const ERROR_MENSAJE_NOEXISTE=256;

//array de mensajes, que relaciona
//códigos de error con su mensaje
$mensajeError=array(
    ERROR_CONEXION=>"Fallo en la conexión con la base de datos",
    ERROR_DOS_PASSWORD=>"Las contraseñas no coinciden",
    ERROR_USUARIO_EXISTE=>"Ese nombre de usuario ya se está utilizando",
    ERROR_USUARIO_NO_EXISTE=>"No existe ningún usuario con ese nombre",
    ERROR_USUARIO_PASSWORD=>"El nombre de usuario o la contraseña no coinciden",
    ERROR_USUARIO_INVALIDO=>"Nombre de usuario incorrecto, ".
        "solo se admiten letras y números",
    ERROR_GRABAR=>"Fallo al grabar los datos",
    ERROR_PASSWORD_CORTA=>"La contraseña debe tener al menos 6 caracteres",
    ERROR_MENSAJE_NOEXISTE=>"No existe ese mensaje"
);
?>