<?php
$x="ksdsadds SKDD dsjhsd sd, dsd shds. ds";
$x=strtolower($x);
$texto=preg_replace("/[^a-z]/", "", $x);
echo $texto;
?>