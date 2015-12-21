<!doctype html>
<html lang="es">
<head>
    <?php
    //cálculo aleatorio de cada nivel de color
    $rojo=mt_rand(0,255);
    $verde=mt_rand(0,255);
    $azul=mt_rand(0,255);
    ?>
    <meta charset="UTF-8">
    <title>Color aleatorio</title>
    <style>
        body{
            background-color:
                <?="rgb($rojo,$verde,$azul);"?>
        }
    </style>
</head>
<body>

</body>
</html>