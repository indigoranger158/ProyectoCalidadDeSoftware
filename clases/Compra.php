<?php

class Compra {

    private $Id;
    private $Id_Usuario;
    private $Id_Producto;
    private $Direccion;
    private $Ciudad;
    private $Provincia;
    private $Codigo_Postal;
    private $Fecha_De_Compra;

    function Compra() {
        $this->Id = 0;
        $this->Id_Usuario = 0;
        $this->Id_Producto = 0;
        $this->Direccion = "";
        $this->Ciudad = "";
        $this->Provincia = "";
        $this->Codigo_Postal = "";
        $this->Fecha_De_Compra = "";
    }

    function getId() {
        return $this->Id;
    }

    function getId_Usuario() {
        return $this->Id_Usuario;
    }

    function getId_Producto() {
        return $this->Id_Producto;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getCiudad() {
        return $this->Ciudad;
    }

    function getProvincia() {
        return $this->Provincia;
    }

    function getCodigo_Postal() {
        return $this->Codigo_Postal;
    }

    function getFecha_De_Compra() {
        return $this->Fecha_De_Compra;
    }

    /* Registra una compra a la base de datos */

    function ingresarCompra($datos) {
        require './conexion.php';
        $fechaCompra = date("Y-m-d");
        $valido = false;
        $Lista_Id_Productos = explode("/", $datos["idProductos"]);
        if (isset($datos["idTarjeta"])) {
            if (!empty($datos["idUsuario"]) && !empty($datos["Direccion"]) && !empty($datos["Ciudad"]) && !empty($datos["Provincia"]) && !empty($datos["CodigoPostal"])) {
                for ($i = 1; $i < count($Lista_Id_Productos); $i++) {
                    if ($Lista_Id_Productos[$i] != "") {
                        $SQL_code = "INSERT INTO `tb_compra`(`Id_Usuario`, `Id_Producto`, `Id_Tarjeta`, `Direccion`, `Ciudad`, `Provincia`, `Codigo_Postal`, `Fecha_De_Compra`) VALUES ('" . $datos["idUsuario"] . "','" . $Lista_Id_Productos[$i] . "','" . $datos["idTarjeta"] . "','" . $datos["Direccion"] . "','" . $datos["Ciudad"] . "','" . $datos["Provincia"] . "','" . $datos["CodigoPostal"] . "','" . $fechaCompra . "')";
                        $respuesta = $mysql->query($SQL_code);
                        $id = $mysql->insert_id;
                        if ($id > 0) {
                            $valido = true;
                        }
                    }
                }
            }
        } else {
            $valido = false;
        }
        if ($valido) {
            session_start();
            unset($_SESSION["productos-carrito"]);
        }
        return $valido;
    }

    /* Obtienen las compras que se le mostraran al usuario */

    function obtenerCoompras($id) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "select tb_compra.Id as 'NumeroFactura',tb_producto.Dir_Imagen_Portada as 'ImagenProducto',tb_producto.Nombre as 'NombreProducto',tb_producto.Precio as 'Precio',tb_producto.Descuento as 'Descuento',tb_marca.Dir_Imagen as 'ImagenMarca',tb_tarjeta.Nombre as 'NombreTarjeta',tb_tarjeta.Numero_Tarjeta as 'NumeroTarjeta',tb_compra.Fecha_De_Compra as 'FechaCompra' from tb_usuario inner join tb_tarjeta inner join tb_producto inner join tb_marca inner join tb_compra where tb_producto.Id=tb_compra.Id_Producto and tb_tarjeta.Id=tb_compra.Id_Tarjeta and tb_producto.Id_Marca=tb_marca.Id and tb_compra.Id_Usuario=tb_usuario.Id and tb_compra.Id_Usuario=" . $id;
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $compras = array();
            $i = 0;
            while ($compra = $respuesta->fetch_assoc()) {
                array_push($compras, $compra);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["datos-compras"] = $compras;
            $valido["cant-compras"] = $i;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Obtiene todas las compras de la pagina */

    function obtenerComprasHappyPetShop() {
        require './conexion.php';
        $valido = array();
        $SQL_code = "select tb_compra.Id as 'NumeroFactura',tb_producto.Dir_Imagen_Portada as 'ImagenProducto',tb_producto.Nombre as 'NombreProducto',tb_producto.Precio as 'Precio',tb_producto.Descuento as 'Descuento',tb_marca.Dir_Imagen as 'ImagenMarca',tb_tarjeta.Nombre as 'NombreTarjeta',tb_tarjeta.Numero_Tarjeta as 'NumeroTarjeta',tb_compra.Fecha_De_Compra as 'FechaCompra' from tb_usuario inner join tb_tarjeta inner join tb_producto inner join tb_marca inner join tb_compra where tb_producto.Id=tb_compra.Id_Producto and tb_tarjeta.Id=tb_compra.Id_Tarjeta and tb_producto.Id_Marca=tb_marca.Id and tb_compra.Id_Usuario=tb_usuario.Id";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $compras = array();
            $i = 0;
            while ($compra = $respuesta->fetch_assoc()) {
                array_push($compras, $compra);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["datos-compras"] = $compras;
            $valido["cant-compras"] = $i;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Obtiene una compra de un usuario con detalles */

    function obtenerComprasHappyPetShopDetallada($dato) {
        require './conexion.php';
        $compra = array();
        if(!empty($dato["Id"])) {
            $SQL_code = "select tb_compra.Id as 'NumeroFactura',tb_producto.Dir_Imagen_Portada as 'ImagenProducto',tb_producto.Nombre as 'NombreProducto',tb_producto.Precio as 'Precio',tb_producto.Descuento as 'Descuento',tb_marca.Dir_Imagen as 'ImagenMarca',tb_tarjeta.Nombre as 'NombreTarjeta',tb_tarjeta.Numero_Tarjeta as 'NumeroTarjeta',tb_usuario.Id as 'IdUsuario',tb_usuario.Dir_Imagen_Perfil as 'DirImagenUsuario',tb_usuario.Nombre as 'NombreUsuario',tb_usuario.Apellido as 'ApellidoUsuario',tb_compra.Fecha_De_Compra as 'FechaCompra',tb_compra.Direccion as 'DireccionCompra',tb_compra.Ciudad as 'CiudadCompra',tb_compra.Provincia as 'ProvinciaCompra',tb_compra.Codigo_Postal as 'CodigoCompra' from tb_usuario inner join tb_tarjeta inner join tb_producto inner join tb_marca inner join tb_compra where tb_producto.Id=tb_compra.Id_Producto and tb_tarjeta.Id=tb_compra.Id_Tarjeta and tb_producto.Id_Marca=tb_marca.Id and tb_compra.Id_Usuario=tb_usuario.Id and tb_compra.Id=" . $dato["Id"];
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $compra = $respuesta->fetch_assoc();
                /* $valido["NumeroFactura"]=$compra["NumeroFactura"];
                  $valido["ImagenProducto"]=$compra["ImagenProducto"];
                  $valido["NombreProducto"]=$compra["NombreProducto"];
                  $valido["Precio"]=$compra["Precio"];
                  $valido["Descuento"]=$compra["Descuento"];
                  $valido["ImagenMarca"]=$compra["ImagenMarca"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"];
                  $valido["IdCompra"]=$compra["Id"]; */
            }
        }
        return $compra;
    }

}
?>

