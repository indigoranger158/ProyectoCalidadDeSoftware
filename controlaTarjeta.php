<?php
include './clases/Tarjeta.php';
$Tarjeta=new Tarjeta();
$accion = $_POST["accion"];

switch ($accion) {
    case "IngresarTarjeta":
        $validacion=$Tarjeta->ingresarTarjeta($_POST);
        break;
    case "EliminarTarjeta":
        $validacion=$Tarjeta->eliminarTarjeta($_POST);
        break;  
}
echo json_encode($validacion);
?>


