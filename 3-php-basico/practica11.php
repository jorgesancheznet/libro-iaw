<?php
    if(isset($_GET["p"])){
        $pagina=$_GET["p"];
        if($pagina<1) $pagina=1;
    }
    else{
        $pagina=1;
    }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Unicode Paginado</title>
    <style>
        #contenedor{
            position:absolute;
            top:60px;
            bottom:0;
            width:100%;
            left:0;
            overflow: scroll;
        }
        #tabla{
            position:absolute;
            width:500px;
            left:50%;
            margin-left:-250px;

        }
        table{
            width:500px;
            border-collapse: collapse;
        }
        th{
            background-color:#000000;
            color:#ffffff;
        }
        td{
            text-align:center;
            border:1px solid;
        }
        .codigo{
            background-color: lightgray;
            width:30px;
        }
        nav{
            position:absolute;
            top:0;
            left:0;
            height:50px;
            width:100%;
            background-color: black;
            color:white;
            text-align: center;
            font-size:40px;
        }
        a{
            display:block;
            background-color:gray;
            width:100px;
            height:40px;
            font-size:40px;
            margin-top:5px;
            border-radius:5px;
            color:white;
            text-decoration: none;
            text-align: center;
            float:left;
        }
        a:last-of-type{
            float:right;
        }
        a:hover{
            background-color:red;
        }
    </style>
</head>
<body>
<nav>
    <?php
    //mostramos el botón de página anterior, pero no si
    //estamos en la primera página
    if($pagina>1) {
        echo '<a href="practica11.php?p=' . ($pagina - 1) . '">&lt;</a>';
    }
    echo "Pagina $pagina";
    echo '<a href="practica11.php?p=' . ($pagina + 1) . '">&gt;</a>';
    ?>
</nav>
<div id="contenedor">
    <div id="tabla">
    <table>
    <?php
        $inicio=($pagina-1)*500+1;
        $fin=$inicio+499;
        //primera fila
        echo "<tr>";
        for($i=1;$i<=5;$i++){
            echo "<th>Código</th><th>Valor</th>";
        }
        echo "</tr>";
        //resto de filas
        echo "<tr>";
        for($i=$inicio;$i<=$fin;$i++){
            echo "<td class='codigo'>$i</td><td>"."&#".$i."</td>";
            if($i%5==0) echo "</tr>";
        }
    echo "</tr>";
    ?>
    </table>
    </div>
</div>
</body>
</html>