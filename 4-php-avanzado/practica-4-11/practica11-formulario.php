<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4-11, Formulario de validación avanzada</title>
    <?php
    include "practica11-constantes.php";
    //grabado de los parámetros GET en variables más manejables
    foreach($_GET as $clave=>$valor){
        $$clave=$valor;
    }

    ?>
    <style>
        #error{
            background-color:#660000;
            color:white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Formulario de validación</h1>
<form action="practica11-validacion.php">
    <fieldset>
        <legend
            <?php
            if(isset($error) &&
                (($error & E_NACION_INCORRECTA) || ($error & E_FALTA_NACION)))
                echo " class='error' ";
            ?>
        >Nacionalidad</legend>
        <input type="radio" name="nacion" id="espanola"
           <?php
           if(isset($nacion) && $nacion=="espanola") echo " checked ";
           ?>
           value="espanola">
        <label for="espanola">Española</label>
        <input type="radio" name="nacion" id="otra"
            <?php
            if(isset($nacion) && $nacion=="otra") echo " checked ";
            ?>
            value="otra">
        <label for="otra">Otra</label>
    </fieldset>
    <br>

    <label for="edad"
        <?php
        if(isset($error) &&
            (($error & E_EDAD_INCORRECTA) || ($error & E_FALTA_EDAD)))
            echo " class='error' ";
        ?>
    >Edad</label>
    <input type="number" name="edad" id="edad"
        <?php
        if(isset($edad)) echo "value='$edad'";
        ?>
    ><br>

    <label for="nif"
        <?php
        if(isset($error) &&
            (($error & E_NIF_INCORRECTO) || ($error & E_FALTA_NIF)))
            echo " class='error' ";
        ?>
        >Número de identificación (DNI, NIE o NIF)</label>
    <input type="text" name="nif" id="nif"
        <?php
        if(isset($nif)) echo " value='$nif' ";
        ?>
    ><br>

    <label for="email"
        <?php
        if(isset($error) &&
            (($error & E_EMAIL_INCORRECTO) || ($error & E_FALTA_EMAIL)))
            echo " class='error' ";
        ?>
        >e-mail
    <input type="text" name="email" id="email"
        <?php
        if(isset($email)) echo " value='$email' ";
        ?>
    ><br>

    <label for="modelo"
        <?php
        if(isset($error) &&
            (($error & E_MODELO_INCORRECTO) || ($error & E_FALTA_MODELO)))
            echo " class='error' ";
        ?>
    >Número de Modelo
    <input type="text" name="modelo" id="modelo"
        <?php
        if(isset($modelo)) echo " value='$modelo' ";
        ?>
    ><br>

    <label for="serie"
    <?php
    if(isset($error) &&
        (($error & E_SERIE_INCORRECTO) || ($error & E_FALTA_SERIE)))
        echo " class='error' ";
    ?>
    >Número de Serie
    <input type="text" name="serie" id="serie"
        <?php
        if(isset($serie)) echo " value='$serie' ";
        ?>
    ><br>

    <button>Validar</button>
</form>
<?php
if(isset($error) && $error){
    echo "<div id='error'>";
    echo "<p>Errores:</p><ul>";
    foreach(MENSAJE_ERROR as $cod_error=>$mensaje){
        if($error & $cod_error){
            echo "<li>$mensaje</li>";
        }
    }
    echo "</ul></div>";
}

?>
</body>
</html>