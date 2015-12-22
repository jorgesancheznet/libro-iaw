<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de localidades</title>
    <style>
        .error{
            color:red;
        }
        .pagina{
            background-color: lightgray;
            font-size:.7em;
        }
        table{
            border-collapse: collapse;
            width:100%;
        }
        td{
            border:1px solid black;
        }
        td:first-of-type{
            font-weight:bold;
        }
        td:last-of-type{
            text-align: right;
            padding-right:10px;
        }
        th{
            background-color: black;
            color:white;
        }
        .paginaActual{
            border:1px solid black;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET["provincia"])==false)
    header("Location:form-practica1.php");
else {
    $mysqli = new mysqli("127.0.0.1", "root", "", "geografia");
    if ($mysqli) {
        $provincia = $_GET["provincia"];
        //paso a mayúsculas de la provincia
        $provincia=strtoupper($provincia);
        //ahora cambiamos los acentos, de otro modo fallan
        $provincia=strtr($provincia,'áéíóúü','ÁÉÍÓÚÜ');

        $sql = "SELECT l.nombre localidad, poblacion " .
            "FROM localidades l " .
            "JOIN provincias p USING(n_provincia) " .
            "WHERE UPPER(p.nombre)='$provincia' " .
            "ORDER BY localidad";
        $res=$mysqli->query($sql);
        if($res->num_rows==0){
            echo "<p class='error'>No existe esa provincia</p>";
        }
        else{
            //****Texto de cabecera de tabla indicando lo que vemos
            echo "<h1>Localidades de $provincia</h1>";
            //comprobación y preparación del nº de página
            if(isset($_GET["pg"])) {
                $pg = $_GET["pg"];
                if($pg<=0 || is_numeric($pg)==false) $pg=1;
            }
            else
                $pg=0;
            //*******preparación de la barra de paginación
            //variable con la parte común de los enlaces, falta calcular
            //la página para cada uno de ellos
            $direccion="practica2-listado.php?provincia=$provincia&pg=";
            echo "<p class='pagina'>Página: ";
            if($pg>1)
                //botón de página anterior, símbolo <
                echo "<a href='$direccion".($pg-1)."'>&lt;</a>";
            $total_pg=(int)($res->num_rows/25+1);//cálculo del total de páginas
            //botones para ir a una página concreta
            for($i=1;$i<=$total_pg;$i++){
                if($i==$pg) //para que salga diferente el nº de página actual
                    echo " <span class='paginaActual'>$i</span> ";
                else
                    echo "<a href='$direccion".$i."'>$i </a>";
            }
            if($pg<$total_pg)
                //botón de página siguiente, símbolo >
                echo "<a href='$direccion".($pg+1)."'>&gt;</a>";
            echo "</p>";
            //***********cálculo de la posición de fila según la página deseada
            $posicion=($pg-1)*25;
            $res->data_seek($posicion);
            //*******listado de localidades, como mucho se deben listar 25
            $cont=1;
            $fila=$res->fetch_assoc();
            echo "<table><tr><th>Localidad</th>".
                 "<th>Población</th></tr>";
            while($fila && $cont<=25){
                echo "<tr><td>{$fila['localidad']}</td>";
                echo "<td>{$fila['poblacion']} habitantes</td>";
                $fila=$res->fetch_assoc();
                $cont++;
            }
            echo "</table>";
        }
    }
}
?>
</body>
</html>