<?php
$test="/^[K-N]?[0-9]+[ASD]$/";
echo preg_match($test,"kA");
echo preg_match($test,"78655144565SD");
echo preg_match($test,"78655144565S");
echo preg_match($test,"L78655144565S");
echo preg_match($test,"K78655144565S");
echo preg_match($test,"K78655144565ASD");
echo preg_match($test,"KS");
?>