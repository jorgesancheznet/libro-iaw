<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4-9, Anagrama</title>
</head>
<body>
<form action="practica8.php">
    <label for="texto1">Escriba el texto1</label><br>
    <input type="text" name="texto1" id="texto1"><br>
    <label for="texto2">Escriba el texto2</label><br>
    <input type="text" name="texto2" id="texto2"><br>
    <button>Probar</button><br>
</form>
<?php
if(isset($_GET["texto1"]) && isset($_GET["texto1"] )){
    //para probar que tenemos un anagrama, convertimos
    //el texto en un array y le ordenamos
    $array1=str_split($_GET["texto1"]);
    $array2=str_split($_GET["texto2"]);
    sort($array1);
    sort($array2);
    if($array1==$array2){
        echo "<p>Es un anagrama</p>";
    }
    else{
        echo "<p>No es un anagrama</p>";
    }
}
?>
</body>
</html>