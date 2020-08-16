<?php
include './clases/Compra.php';
$Compra = new Compra();
$accion = $_POST["accion"];

switch ($accion) {
    case "IngresarCompra":
        $validacion=$Compra->ingresarCompra($_POST);
        break;
    case "ObtenerCompra":
        $validacion=$Compra->obtenerComprasHappyPetShopDetallada($_POST);
        break;
    
}
echo json_encode($validacion);
?>

