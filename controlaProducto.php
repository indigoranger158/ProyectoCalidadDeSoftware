<?php
include './clases/Producto.php';
$Producto=new Producto();
$accion = $_POST["accion"];

switch ($accion) {
    case "FiltrarProductos":
        $validacion=$Producto->filtrarProductos($_POST);
        break;
    case "Comentar":
        $validacion=$Producto->comentar($_POST);
        break;
    case "IngresarAlInventario":
        $validacion=$Producto->ingresarAlInventario($_POST);
        break;
    case "ComprobarEliminarProductoPorId":
        $validacion=$Producto->comprobarEliminarProductoPorId($_POST);
        break;
    case "EliminarProductoPorId":
        $validacion=$Producto->eliminarProductoPorId($_POST);
        break;
    case "BuscarProductoAActualizarDescuento":
        $validacion=$Producto->buscarProductoAActualizarDescuento($_POST);
        break;
    case "ActualizarDescuentoProducto":
        $validacion=$Producto->actualizarDescuentoProducto($_POST);
        break;
    case "IngresarProductoAlCarrito":
        $validacion=$Producto->ingresarProductoAlCarrito($_POST);
        break;
    case "VaciarCarrito":
        $validacion=$Producto->vaciarCarrito();
        break;
    case "EliminarProductoDelCarrito":
        $validacion=$Producto->eliminarProductoDelCarrito($_POST);
        break;
    
}
echo json_encode($validacion);
?>

