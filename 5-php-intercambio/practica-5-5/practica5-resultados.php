<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobación</title>
</head>
<body>
<?php
//comprobar si se ha grabado la sesión
if(isset($_SESSION["palabras"])){
    $palabras=$_SESSION["palabras"];
    //comprobar si se ha recibido el array
    if(isset($_GET["result"])){
        //comprobar aciertos
        $aciertos=0;
        $result=$_GET["result"];
        foreach($palabras as $i=>$palabra){
            //buscar la palabra en la sesión
            if(array_search($palabra,$result)!==false) {
                $aciertos++;
                echo "<p>Acertaste <strong>$palabra</strong></p>";
            }
            else{
                echo "<p>Fallaste <strong>$palabra</strong></p>";
            }
        }
        echo "<h2>Número de aciertos: $aciertos</h2>";
        if($aciertos==5) echo "<h2>¡Acertaste todas!</h2>";

    }
    //si no se pasan resultados, volvemos a empezar
    else header("Location:practica5-jugar.php");
}
//si no hay almacenado resultados, volvemos a empezar
else header("Location:practica5-jugar.php");
?>
<a href="practica5-jugar.php">Volver a jugar</a>
</body>
</html>