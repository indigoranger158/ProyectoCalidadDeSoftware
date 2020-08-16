<?php
/*Conexion con el servidor*/
$hostname = "localhost"; // servidor local, si fuera externo se pone la ip
$database = "bd_proyecto_tienda";
$username = "root";
$passwordbd = "";


$mysql = new mysqli($hostname, $username, $passwordbd, $database);

if ($mysql->connect_errno) {
    $error_conexion = "Fallo la conexión";
} else {
    $error_conexion = false;
}
?>

