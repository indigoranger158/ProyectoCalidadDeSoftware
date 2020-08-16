<?php
include './clases/Marca.php';
$Marca=new Marca();
$accion = $_POST["accion"];

switch ($accion) {
    case "IngresarMarca":
        $validacion=$Marca->ingresarMarca($_POST);
        break;
    case "BuscarMarcaPorId":
        $validacion=$Marca->buscarMarcaPorId($_POST);
        break;
    case "ActualizarMarca":
        $validacion=$Marca->actualizarMarca($_POST);
        break;
    
}
echo json_encode($validacion);
?>

