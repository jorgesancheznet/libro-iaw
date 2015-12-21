<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asteriscos</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
<form action="practica5.php">
    <label for="n">Escriba el número de asteriscos</label>
    <input type="number" name="n" id="n" min="1"/><br/>
    <button>Enviar</button>
</form>
<?php
//comprobamos si la página recibe correctamente el
//número de asteriscos
if(isset($_GET["n"])){
    $n=$_GET["n"];
    if(is_numeric($n) && $n>=1){
        //los datos son correctos, escribimos los asteriscos
        echo "<p>";
        for($i=1;$i<=$n;$i++){
            echo "*";
        }
        echo "</p>";
    }
    else{
        echo "<p class='error'>Número incorrecto</p>";
    }
}
?>
</body>
</html>