<?php
const E_FALTA_NACION=1;
const E_NACION_INCORRECTA=2;
const E_EDAD_INCORRECTA=4;
const E_FALTA_EDAD=8;
const E_FALTA_NIF=16;
const E_NIF_INCORRECTO=32;
const E_FALTA_EMAIL=64;
const E_EMAIL_INCORRECTO=128;
const E_FALTA_MODELO=256;
const E_MODELO_INCORRECTO=512;
const E_FALTA_SERIE=1024;
const E_SERIE_INCORRECTO=2048;

const MENSAJE_ERROR=array(
    E_FALTA_NACION=>"No se indicó la nacionalidad",
    E_NACION_INCORRECTA=>"Error al enviar los datos de la nacionalidad",
    E_EDAD_INCORRECTA=>"Edad incorrecta",
    E_FALTA_EDAD=>"No se indicó la edad",
    E_FALTA_NIF=>"No se indicó el número de identificación",
    E_NIF_INCORRECTO=>"El número de identificación es incorrecto",
    E_FALTA_EMAIL=>"No se indicó e-mail alguno",
    E_EMAIL_INCORRECTO=>"El e-mail no es válido (solo se admiten e-mails de hotmail o gmail)",
    E_FALTA_MODELO=>"No se indicó el modelo",
    E_MODELO_INCORRECTO=>"El modelo no es válido (deberían ser tres números y dos letras)",
    E_FALTA_SERIE=>"No se indicó el número de serie",
    E_SERIE_INCORRECTO=>"El nº de serie no es válido",
);



?>