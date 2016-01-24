<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación práctica 4-11</title>
</head>
<body>
<?php
include "practica11-constantes.php";
$error=0; //variable que acumula los errores

//validación de la nacionalidad
if(isset($_GET["nacion"])){
    $nacion=$_GET["nacion"];
    if($nacion!="espanola" && $nacion!="otra") $error+=E_NACION_INCORRECTA;
}
else $error+=E_FALTA_NACION;

//validación de la edad
if(isset($_GET["edad"])) {
    $edad = $_GET["edad"];
    if(is_numeric($edad)==false || $edad<1 || $edad>150)
        $error+=E_EDAD_INCORRECTA;
}
else $error+=E_FALTA_EDAD;

//validación del NIF
if(isset($_GET["nif"])) {
    $nif = $_GET["nif"];
    if (preg_match("/^[0-9XYZ][0-9]{7}[A-Z]$/",
            $nif) == false) {
        $error += E_NIF_INCORRECTO;
    } else {
        if ($nif[0] == "X") $nif[0] = "0";
        elseif ($nif[0] == "Y") $nif[0] = "1";
        elseif ($nif[0] == "Z") $nif[0] = "2";
        $numerosNIF = substr($nif, 0, 8);
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $resto = $numerosNIF % 23;
        if ($nif[8] != $letras[$resto]) {
            $error += E_NIF_INCORRECTO;
        }
    }
}
else $error+=E_FALTA_NIF;

//validación del e-mail
if(isset($_GET["email"])) {
    $email = $_GET["email"];
    if(preg_match("/^.*@((hotmail\.com)|(gmail\.com))$/",
            $email) == false){
        $error+=E_EMAIL_INCORRECTO;
    }
}
else $error+=E_FALTA_EMAIL;

//validación del modelo
if(isset($_GET["modelo"])) {
    $modelo = $_GET["modelo"];
    if(preg_match("/^[A-Z]{3}[0-9]{4}$/",
            $modelo) == false){
        $error+=E_MODELO_INCORRECTO;
    }
}
else $error+=E_FALTA_MODELO;

//validación del número de serie
if(isset($_GET["serie"])) {
    $serie = $_GET["serie"];
    if(preg_match("/^((S[0-9]{3}[A-Z]{2})|".
            "(Z[0-9]{3}[357](B|C|D[1-3])[A-Z]{2}))$/",
            $serie) == false){
        $error+=E_SERIE_INCORRECTO;
    }
}
else $error+=E_FALTA_SERIE;


//Envío de datos y resultados
if($error) {
    //preparamos la cadena de vuelta con los datos que se han enviado
    $cad="?";
    foreach($_GET as $clave=>$valor){
        $$clave=$clave;
        $cad.=$$clave."=".$valor."&";
    }
    header("Location:practica11-formulario.php".$cad."error=$error");
}
else echo "<h1>¡Datos correctos!</h1>";

?>


</body>
</html>

