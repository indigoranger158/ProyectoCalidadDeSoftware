<?php
include './clases/Facturacion.php';
$Facturacion=new Facturacion();
$accion = $_POST["accion"];

switch ($accion) {
    case "IngresarFacturacion":
        $validacion=$Facturacion->ingresarFacturacion($_POST);
        break;
    case "ActualizarFacturacion":
        $validacion=$Facturacion->actualizarFacturacion($_POST);
        break;
}
echo json_encode($validacion);
?>

