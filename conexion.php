<?php
$hostname = ""; // servidor local, si fuera externo se pone la ip
$database = "bd_proyecto_tienda";
$username = "";
$passwordbd = "";
 
foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
     
    $hostname = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $passwordbd = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
 
$mysql = new mysqli($hostname, $username, $passwordbd, $database);
if ($mysql->connect_errno) {
    $error_conexion = "Fallo la conexión";
} else {
    $error_conexion = false;
}
?>

