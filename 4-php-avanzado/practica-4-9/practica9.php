<?php
function mailValido($array){
    $patron="/^([0-9a-zA-Z_]+(\.[0-9a-zA-Z_])*)+@".
        "((gmail\.com)|(yahoo\.com)|(yahoo\.es)|(hotmail\.com))$/";
    reset($array);
    $valido=true;
    while($valido && current($array)){
        $valido=preg_match($patron, current($array));
        next($array);
    }
    return $valido;
}

$prueba=array("e.e..no.valido@yahoo.com","so@yahoo.es","no%valido@hotmail.com",
    "siloes@yahoo.es");
echo mailValido($prueba);
?>