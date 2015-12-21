<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuadros aleatorios</title>
    <style>
        div{
            position:fixed;
            width:60px;
            height:60px;
        }

    </style>
</head>
<body>
<?php
    for($i=1;$i<=2000;$i++){
        $left=mt_rand(0,100)."%";
        $top=mt_rand(0,100)."%";
        $colorR=mt_rand(0,255);
        $colorG=mt_rand(0,255);
        $colorB=mt_rand(0,255);
        echo "<div style='left:$left;top:$top;".
             "background-color:rgb($colorR,$colorG,$colorB)'></div>";
    }

?>

</body>
</html>