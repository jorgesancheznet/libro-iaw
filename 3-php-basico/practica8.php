<?php
    if(isset($_GET["n"])){
        $n=$_GET["n"];
    }
    else{
        $n="";
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar pares</title>
</head>
<body>
<form action="practica8.php">
    <h1>Mostrar suma de pares</h1>
    <label for="n">Escriba un número entero</label>
    <input type="number" min="1" name="n" id="n" value="<?=$n?>"/><br/>
    <button>Calcular</button>
    <br/>
    <?php
    if($n!=""){//han enviado un número
        //cálculo de la suma de pares
        $suma=0;
        for($i=2;$i<$n;$i+=2){
            $suma+=$i;
        }
        echo "<p>La suma es <strong>$suma</strong></p>";
    }
    ?>
</form>

</body>
</html>