<?php
/*Conexion con el servidor*/
$hostname = "MYSQLCONNSTR_localdb"; // servidor local, si fuera externo se pone la ip
$database = "bd_proyecto_tienda";
$username = "";
$passwordbd = "";

$mysql = new mysqli($hostname, $username, $passwordbd, $database);

if ($mysql->connect_errno) {
    $error_conexion = "Fallo la conexión";
} else {
    $error_conexion = false;
}
?>

