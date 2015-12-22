<?php
$elegidos=array();
if(isset($_COOKIE["elegidos"])){
    $elegidos=unserialize($_COOKIE["elegidos"]);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 5-6, Selección de tonos</title>
    <?php
    function tonoAleatorio(){
        $rojo=mt_rand(0,255);
        $verde=mt_rand(0,255);
        $azul=mt_rand(0,255);
        return "rgb($rojo,$verde,$azul)";
    }
    ?>
    <link rel="stylesheet" href="practica6.css">
</head>
<body>
<div id="barraSeleccion">
    <div id="titulo">
        <h1>Colores Seleccionados</h1>
    </div>
    <div id="coloresElegidos">
        <?php
        foreach($elegidos as $color){
            echo "<div class='cuadrado' style='$color'></div>";
        }
        ?>
    </div>
</div>
<div id="principal">
    <?php
    for($i=1;$i<=24;$i++){
        echo "<div class='cuadrado' style='background-color:".
            tonoAleatorio().";'></div>";
    }

    ?>
</div>
<script>
    window.onload=function() {
        var listaColores = document.getElementsByClassName("cuadrado");
        for (var i = 0; i < listaColores.length; i++) {
            listaColores[i].onclick = function () {
                //hacemos una petición GET a la propia página con el parámetro
                //color conteniendo el color sobre el que hemos hecho click
                window.location="practica6-control.php?color="+this.getAttribute("style");
            }
        }
    }
</script>
</body>
</html>