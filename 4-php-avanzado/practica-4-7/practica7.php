<?php
/*
 * Recibe un texto y devuelve el texto convirtiendo los caracteres
 * con tilde y acentuados a sus equivalentes ASCII
 */
function convertirASCII($txt){
    $esp="ÁÉÍÓÚÜáéíóúü";
    $ascii="AEIOUUaeiouu";
    //convertirmos a array
    $a_esp=str_split($esp);
    $a_ascii=str_split($ascii);
    //reemplazo
    $texto=str_replace($a_esp,$a_ascii,$txt);
    return $texto;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prácvtica 4.7, Palíndromos</title>
</head>
<body>
<form action="practica7.php">
    <label for="texto">Escriba el texto</label><br>
    <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
    <button>Probar</button><br>
</form>
<?php
if(isset($_GET["texto"])){
    //convertimos las tildes
    $texto=convertirASCII($_GET["texto"]);
    //paso a minúsculas
    $texto=strtolower($texto);
    //se elimina cualquier carácter que no sea una letra de la A a la Z
    $texto=preg_replace("/[^a-z]/", "", $texto);
    //se compara con su inverso
    if($texto==strrev($texto)){
        echo "<p>Es un palíndromo</p>";
    }
    else{
        echo "<p>No es un palíndromo</p>";
    }
}
?>
</body>
</html>