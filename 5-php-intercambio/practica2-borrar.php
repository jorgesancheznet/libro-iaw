<?php
session_start();
unset($_SESSION);
session_destroy();
header("location:practica2-index.php");
?>