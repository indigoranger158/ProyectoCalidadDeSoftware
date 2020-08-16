<?php
/*Conexion con el servidor*/
$hostname = "52.173.28.95"; // servidor local, si fuera externo se pone la ip
$database = "bd_proyecto_tienda";
$username = "azure";
$passwordbd = "";

$mysql = new mysqli($hostname, $username, $passwordbd, $database);

if ($mysql->connect_errno) {
    $error_conexion = "Fallo la conexión";
} else {
    $error_conexion = false;
}
?>

