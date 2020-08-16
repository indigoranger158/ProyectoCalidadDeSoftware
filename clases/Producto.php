<?php

class Producto {

    private $Id;
    private $Nombre;
    private $Precio;
    private $Descuento;
    private $DescripcionG;
    private $DescripcionP;
    private $Cantidad;
    private $Informacion;
    private $IdMarca;
    private $Tipo;
    private $Calificacion;
    private $Dir_Imagen_Portada;
    private $Dir_Imagen_1;
    private $Dir_Imagen_2;
    private $Dir_Imagen_3;

    function Producto() {
        $this->Id = 0;
        $this->Nombre = "";
        $this->Precio = 0.0;
        $this->Descuento = 0;
        $this->DescripcionG = "";
        $this->DescripcionP = "";
        $this->Cantidad = 0;
        $this->Informacion = "";
        $this->IdMarca = 0;
        $this->Tipo = "";
        $this->Calificacion = 0.0;
        $this->Dir_Imagen_Portada = "";
        $this->Dir_Imagen_1 = "";
        $this->Dir_Imagen_2 = "";
        $this->Dir_Imagen_3 = "";
    }

    function getId() {
        return $this->Id;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getDescuento() {
        return $this->Descuento;
    }

    function getDescripcionG() {
        return $this->DescripcionG;
    }

    function getDescripcionP() {
        return $this->DescripcionP;
    }

    function getCantidad() {
        return $this->Cantidad;
    }

    function getInformacion() {
        return $this->Informacion;
    }

    function getIdMarca() {
        return $this->IdMarca;
    }

    function getDir_Imagen_Portada() {
        return $this->Dir_Imagen_Portada;
    }

    function getDir_Imagen_1() {
        return $this->Dir_Imagen_1;
    }

    function getDir_Imagen_2() {
        return $this->Dir_Imagen_2;
    }

    function getDir_Imagen_3() {
        return $this->Dir_Imagen_3;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function getCalificacion() {
        return $this->Calificacion;
    }

    function obtenerListaProductos() {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT * FROM `tb_producto`";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            $cantProductos = 0;
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
                $cantProductos++;
            }
            $valido["valido"] = "true";
            $valido["datos-productos"] = $productos;
            $valido["cant-productos"] = $cantProductos;
        } else {
            $valido["valido"] = "false";
        }

        return $valido;
    }

    /* Obtiene la cantidad total de los productos de acuerdo al filtro aplicado */

    function obtenerTotalListaProductosFiltro($tipoProducto, $tipo, $genero, $montoMin, $montoMax, $descuento) {
        require './conexion.php';
        $valido = array();
        if ($montoMax == 0) {
            $montoMax = 999999;
        }
        if ($tipoProducto == "Ropa") {
            if ($tipo == "null") {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . "";
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . "";
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . "";
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . "";
                    }
                }
            } else {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . "";
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . "";
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . "";
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . "";
                    }
                }
            }
        }
        if ($tipoProducto == "Accesorio") {
            $SQL_code = "SELECT * FROM `tb_producto`";
        }
        if ($tipoProducto != "Ropa" && $tipoProducto != "Accesorio") {
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Nombre LIKE '" . $tipoProducto . "%'";
        }
        if ($tipoProducto == "null") {
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Descuento=" . $descuento . "";
        }
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            $i = 0;
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["cant-datos"] = $i;
        } else {
            $valido["cant-datos"] = 0;
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Obtiene la cantidad de productos que muestra una pagina de product que es 9 */

    function obtenerPaginaListaProductosFiltro($tipoProducto, $tipo, $genero, $montoMin, $montoMax, $descuento, $pagina) {
        require './conexion.php';
        $limit1 = $pagina * 9;
        $limit2 = 9;
        $limites = "LIMIT " . $limit1 . "," . $limit2;
        if ($montoMax == 0) {
            $montoMax = 999999;
        }
        $valido = array();
        if ($tipoProducto == "Ropa") {
            if ($tipo == "null") {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                }
            } else {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Ropa' and tb_ropa.Tipo='" . $tipo . "' and tb_ropa.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                }
            }
        }
        if ($tipoProducto == "Accesorio") {
            if ($tipo == "null") {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_marca inner join tb_accesorio where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                }
            } else {
                if ($genero == "null") {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Tipo='" . $tipo . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                } else {
                    if ($descuento == 0) {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Tipo='" . $tipo . "' and tb_accesorio.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " " . $limites;
                    } else {
                        $SQL_code = "SELECT tb_producto.Id as 'Id',tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion',tb_producto.Tipo as 'Tipo', tb_producto.Calificacion as 'Calificacion', tb_producto.Id_Marca as 'Id_Marca', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id and tb_producto.Tipo='Accesorio' and tb_accesorio.Tipo='" . $tipo . "' and tb_accesorio.Genero='" . $genero . "' and tb_producto.Precio>" . $montoMin . " and tb_producto.Precio<" . $montoMax . " and tb_producto.Descuento=" . $descuento . " " . $limites;
                    }
                }
            }
        }
        if ($tipoProducto != "Ropa" && $tipoProducto != "Accesorio") {
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Nombre LIKE '" . $tipoProducto . "%' ";
        }
        if ($tipoProducto == "null") {
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Descuento=" . $descuento . " " . $limites;
        }
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
            }
            $valido["valido"] = "true";
            $valido["datos-productos"] = $productos;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Obtiene los ultimos producto ingresado a la base de datos */

    function obtenerUltimosProductos() {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT * FROM tb_producto ORDER BY tb_producto.Id DESC LIMIT 3";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
            }
            $valido["valido"] = "true";
            $valido["datos-productos"] = $productos;
        } else {
            $valido["valido"] = "false";
        }

        return $valido;
    }

    /* Obtiene productos aleatorios de la base de datos */

    function obtenerProductoRandom() {
        require './conexion.php';
        $SQL_code = "select * from tb_producto order by rand()LIMIT 0,1";
        $respuesta = $mysql->query($SQL_code);
        $producto = $respuesta->fetch_assoc();
        return $producto;
    }

    /* Obtiene la ropa relacionada a la seleccionada en single.php */

    function obtenerListaRopaRelacionada($tipoProducto, $tipoRopa, $precioProducto) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT tb_producto.Id as 'Id',
tb_producto.Nombre as 'Nombre',
tb_producto.Precio as 'Precio',
tb_producto.Descuento as 'Descuento',
tb_producto.DescripcionG as 'DescripcionG',
tb_producto.DescripcionP as 'DescripcionP',
tb_producto.Cantidad as 'Cantidad',
tb_producto.Informacion as 'Informacion',
tb_producto.Tipo as 'Tipo',
tb_producto.Calificacion as 'Calificacion',
tb_producto.Id_Marca as 'Id_Marca',
tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada',
tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1',
tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2'

FROM `tb_producto` inner join tb_ropa WHERE tb_producto.Id=tb_ropa.Id_Producto AND tb_producto.Tipo='" . $tipoProducto . "' AND tb_ropa.Tipo='" . $tipoRopa . "' AND tb_producto.Precio>='" . $precioProducto . "'";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
            }
            $valido["valido"] = "true";
            $valido["datos-productos"] = $productos;
        } else {
            $valido["valido"] = "false";
        }

        return $valido;
    }

    /* Obtiene los accesorio relacionados al accesorio seleccionado en sigle.php */

    function obtenerListaAccesorioRelacionada($tipoProducto, $tipoAccesorio, $precioProducto) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT tb_producto.Id as 'Id',
tb_producto.Nombre as 'Nombre',
tb_producto.Precio as 'Precio',
tb_producto.Descuento as 'Descuento',
tb_producto.DescripcionG as 'DescripcionG',
tb_producto.DescripcionP as 'DescripcionP',
tb_producto.Cantidad as 'Cantidad',
tb_producto.Informacion as 'Informacion',
tb_producto.Tipo as 'Tipo',
tb_producto.Calificacion as 'Calificacion',
tb_producto.Id_Marca as 'Id_Marca',
tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada',
tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1',
tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2'

FROM `tb_producto` inner join tb_accesorio WHERE tb_producto.Id=tb_accesorio.Id_Producto AND tb_producto.Tipo='" . $tipoProducto . "' AND tb_accesorio.Tipo='" . $tipoAccesorio . "' AND tb_producto.Precio>='" . $precioProducto . "'";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $productos = array();
            while ($producto = $respuesta->fetch_assoc()) {
                array_push($productos, $producto);
            }
            $valido["valido"] = "true";
            $valido["datos-productos"] = $productos;
        } else {
            $valido["valido"] = "false";
        }

        return $valido;
    }

    /* Filtra los accesorios */

    function filtrarAccesorio($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra accesorios solo para machos */

    function filtrarAccesorioMacho($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Macho'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra collares solo para machos */

    function filtrarAccesorioMachoCollar($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Macho' and tb_accesorio.Tipo='Collar'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra gorras solo para machos */

    function filtrarAccesorioMachoGorra($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Macho' and tb_accesorio.Tipo='Gorra'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra accesoriso para hembra */

    function filtrarAccesorioHembra($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Hembra'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra collares para hembra */

    function filtrarAccesorioHembraCollar($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Hembra' and tb_accesorio.Tipo='Collar'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra grroas para hembra */

    function filtrarAccesorioHembraGorra($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Accesorio' from tb_producto inner join tb_accesorio where tb_producto.Tipo='Accesorio' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_accesorio.Id_Producto and tb_accesorio.Genero='Hembra' and tb_accesorio.Tipo='Gorra'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Accesorio"];
    }

    /* Muestra toda la ropa */

    function filtrarRopa($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra ropa para hembra */

    function filtrarRopaHembra($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muetra vestidos */

    function filtrarRopaHembraVestido($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Vestido'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra blusas */

    function filtrarRopaHembraBlusa($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Blusa'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra los overoles de hembra */

    function filtrarRopaHembraOverol($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Overol'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra las pijamas para hembra */

    function filtrarRopaHembraPijama($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Pijama'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra enaguas */

    function filtrarRopaHembraEnagua($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Enagua'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra abrigos para hembra */

    function filtrarRopaHembraAbrigo($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Hembra' and tb_ropa.Tipo='Abrigo'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra ropa para macho */

    function filtrarRopaMacho($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra camisetas */

    function filtrarRopaMachoCamiseta($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho' and tb_ropa.Tipo='Camiseta'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra camisas */

    function filtrarRopaMachoCamisa($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho' and tb_ropa.Tipo='Camisa'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra overoles para macho */

    function filtrarRopaMachoOverol($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho' and tb_ropa.Tipo='Overol'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra pijamas para macho */

    function filtrarRopaMachoPijama($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho' and tb_ropa.Tipo='Pijama'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Muestra abrigos para macho */

    function filtrarRopaMachoAbrigo($precioMin, $precioMax) {
        require './conexion.php';
        $valido = "";
        $SQL_code = "select COUNT(tb_producto.Id) as 'Cant_Ropa' from tb_producto inner join tb_ropa where tb_producto.Tipo='Ropa' and tb_producto.Precio>" . $precioMin . " and tb_producto.Precio<" . $precioMax . " and tb_producto.Id=tb_ropa.Id_Producto and tb_ropa.Genero='Macho' and tb_ropa.Tipo='Abrigo'";
        $respuesta = $mysql->query($SQL_code);
        $cant = $respuesta->fetch_assoc();
        return $cant["Cant_Ropa"];
    }

    /* Funcion que devuelve la cantidad de ropa de acuerdo a su filtro */

    function filtrarProductos($datos) {
        $montos = explode(" - ", $datos["amount"]);
        $montoMin = explode("₡", $montos[0]);
        $montoMax = explode("₡", $montos[1]);
        $respuesta = array(
            "Cant_Ropa" => $this->filtrarRopa($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho" => $this->filtrarRopaMacho($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho_Camisetas" => $this->filtrarRopaMachoCamiseta($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho_Camisas" => $this->filtrarRopaMachoCamisa($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho_Overoles" => $this->filtrarRopaMachoOverol($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho_Pijamas" => $this->filtrarRopaMachoPijama($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Macho_Abrigos" => $this->filtrarRopaMachoAbrigo($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra" => $this->filtrarRopaHembra($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Vestidos" => $this->filtrarRopaHembraVestido($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Blusas" => $this->filtrarRopaHembraBlusa($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Overoles" => $this->filtrarRopaHembraOverol($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Pijamas" => $this->filtrarRopaHembraPijama($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Enaguas" => $this->filtrarRopaHembraEnagua($montoMin[1], $montoMax[1]),
            "Cant_Ropa_Hembra_Abrigos" => $this->filtrarRopaHembraAbrigo($montoMin[1], $montoMax[1]),
            "Cant_Accesorio" => $this->filtrarAccesorio($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Macho" => $this->filtrarAccesorioMacho($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Macho_Collares" => $this->filtrarAccesorioMachoCollar($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Macho_Gorras" => $this->filtrarAccesorioMachoGorra($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Hembra" => $this->filtrarAccesorioHembra($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Hembra_Collares" => $this->filtrarAccesorioHembraCollar($montoMin[1], $montoMax[1]),
            "Cant_Accesorio_Hembra_Gorras" => $this->filtrarAccesorioHembraGorra($montoMin[1], $montoMax[1]),
            "MontoMin" => $montoMin[1],
            "MontoMax" => $montoMax[1],
        );
        return $respuesta;
    }

    /* Obtiene un solo producto */

    function obtenerProducto($Id, $Tipo) {
        require './conexion.php';
        switch ($Tipo) {
            case "Ropa":
                /* Select de un producto de tipo ropa */
                $SQL_code = "SELECT tb_ropa.Id as 'Id', tb_ropa.Talla as 'Talla', tb_ropa.Color as 'Color', tb_ropa.Genero as 'Genero', tb_ropa.Tipo as 'TipoRopa', tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion', tb_marca.Nombre as 'Marca', tb_marca.Informacion as 'InfoMarca', tb_marca.Dir_Imagen as 'Dir_Imagen_Marca',tb_producto.Tipo as 'TipoProducto', tb_producto.Calificacion as 'Calificacion', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id AND tb_producto.Id=" . $Id . "";
                $respuesta = $mysql->query($SQL_code);
                if ($respuesta->num_rows > 0) {
                    $producto = $respuesta->fetch_assoc();
                    return $producto;
                }
                break;
            case "Accesorio":
                /* Select de un producto de tipo ropa */
                $SQL_code = "SELECT tb_accesorio.Id as 'Id', tb_accesorio.Talla as 'Talla', tb_accesorio.Color as 'Color', tb_accesorio.Genero as 'Genero', tb_accesorio.Tipo as 'TipoAccesorio', tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion', tb_marca.Nombre as 'Marca', tb_marca.Informacion as 'InfoMarca', tb_marca.Dir_Imagen as 'Dir_Imagen_Marca',tb_producto.Tipo as 'TipoProducto', tb_producto.Calificacion as 'Calificacion', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id AND tb_producto.Id=" . $Id . "";
                $respuesta = $mysql->query($SQL_code);
                if ($respuesta->num_rows > 0) {
                    $producto = $respuesta->fetch_assoc();
                    return $producto;
                }
                break;
        }
    }

    /* Funcion de obtener comentarios */

    function obtenerComentarios($idProducto) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "select tb_usuario.Nombre as 'Nombre', tb_usuario.Dir_Imagen_Perfil as 'Dir_Imagen_Perfil', tb_comentario.Calificacion as 'Calificacion', tb_comentario.Asunto as 'Asunto', tb_comentario.Comentario as 'Comentario' FROM tb_usuario inner join tb_comentario inner join tb_producto where tb_usuario.Id=tb_comentario.Id_Usuario and tb_comentario.Id_Producto=tb_producto.Id and " . $idProducto . "=tb_comentario.Id_Producto";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $comentarios = array();
            while ($comentario = $respuesta->fetch_assoc()) {
                array_push($comentarios, $comentario);
            }
            $valido["valido"] = "true";
            $valido["datos-comentarios"] = $comentarios;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Obtiene y devuelve la cantidad de calificaciones hechas al producto */

    function obtenerNumeroDeCalificaciones($idProducto) {
        require './conexion.php';
        $SQL_code = "SELECT COUNT(tb_producto.Id) AS 'Num_Calificaciones' FROM tb_producto inner join tb_comentario where tb_comentario.Id_Producto=tb_producto.Id and tb_comentario.Id_Producto=" . $idProducto . "";
        $respuesta = $mysql->query($SQL_code);
        $numCalificaciones = $respuesta->fetch_assoc();
        return $numCalificaciones["Num_Calificaciones"];
    }

    /* Obtiene la calificacion actual del producto y regresa la nueva calificacion */

    function obtenerNuevaCalificacionProducto($idProducto, $calificacion) {
        require './conexion.php';
        $SQL_code = "SELECT tb_producto.Calificacion as 'Calificacion' from tb_producto where tb_producto.Id=" . $idProducto . "";
        $respuesta = $mysql->query($SQL_code);
        $producto = $respuesta->fetch_assoc();
        $calificacionProducto = $producto["Calificacion"];
        $numCalificacionesDelProducto = $this->obtenerNumeroDeCalificaciones($idProducto);
        $nuevaCalificacionProducto1 = $calificacionProducto * $numCalificacionesDelProducto;
        $nuevaCalificacionProducto2 = $nuevaCalificacionProducto1 + $calificacion;
        $nuevaCantidadDeComentarios = $numCalificacionesDelProducto + 1;
        $nuevaCalificacionProducto3 = $nuevaCalificacionProducto2 / $nuevaCantidadDeComentarios;
        return $nuevaCalificacionProducto3;
    }

    /* Crea el comentario y actualiza la calificacion del producto */

    function comentar($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["Calificacion"]) && !empty($datos["Asunto"]) && !empty($datos["Comentario"])) {
            $calificacion = $this->obtenerNuevaCalificacionProducto($datos["IdProducto"], $datos["Calificacion"]);
            $SQL_code = "INSERT INTO `tb_comentario`(`Id_Producto`, `Id_Usuario`, `Calificacion`, `Comentario`, `Asunto`) VALUES ('" . $datos["IdProducto"] . "','" . $datos["IdUsuario"] . "','" . $datos["Calificacion"] . "','" . $datos["Comentario"] . "','" . $datos["Asunto"] . "')";
            $respuesta = $mysql->query($SQL_code);
            $id = $mysql->insert_id;
            if ($id > 0) {
                $this->actualizaCalificacionProducto($datos["IdProducto"], $calificacion);
                $valido = true;
            } else {
                $valido = false;
            }
        }
        return $valido;
    }

    /* Actualiza la calificacion de un producto */

    function actualizaCalificacionProducto($idProducto, $calificacion) {
        require './conexion.php';
        $SQL_code = "UPDATE `tb_producto` SET `Calificacion`=" . $calificacion . " WHERE tb_producto.Id=" . $idProducto . "";
        $respuesta = $mysql->query($SQL_code);
    }

    /* Obtiene los colores de un producto */

    function obtenerColores($datos) {
        $colores = explode("/", $datos);
        return $colores;
    }

    /* Obtiene las tallas de un producto */

    function obtenerTallas($datos) {
        $tallas = explode("/", $datos);
        return $tallas;
    }

    /* funcion que ingresa las funciones para ingresar un producto a la base de datos */

    function ingresarAlInventario($datos) {
        $valido = false;
        /* Comprueba que la informacion no este vacia de lo contrario retorna un false */
        if (!empty($datos["Nombre"]) && !empty($datos["Precio"]) && !empty($datos["DescripcionG"]) && !empty($datos["DescripcionP"]) && !empty($datos["Cantidad"]) && !empty($datos["Informacion"]) && !empty($datos["TipoProducto"]) && !empty($datos["SubTipoProducto"]) && !empty($datos["nombreMarca"]) && !empty($datos["nomImagenPortadaProducto"]) && !empty($datos["nomImagen1Producto"]) && !empty($datos["nomImagen2Producto"])) {
            if ($datos["Descuento"] == "") {
                $datos["Descuento"] = 0;
            }
            /* Se da formato a las direcciones de las imagenes del producto */
            $dirImagenPortada = "images/productos/" . $datos["nomImagenPortadaProducto"];
            $dirImagen1 = "images/productos/" . $datos["nomImagen1Producto"];
            $dirImagen2 = "images/productos/" . $datos["nomImagen2Producto"];
            /* Se saca el id de nombreMarca */
            $infoMarca = explode(" - ", $datos["nombreMarca"]);
            $idMarca = $infoMarca[0];
            /* Se da formato a los colores */
            $lista_colores = array("Blanco", "Rojo", "Azul", "Gris", "Verde", "Amarillo", "Rosa", "Celeste", "Morado", "Cafe", "Negro");
            $colores_producto = "";
            for ($i = 0; $i < count($lista_colores); $i++) {
                if (isset($datos[$lista_colores[$i]])) {
                    $colores_producto = $colores_producto . "/" . $lista_colores[$i];
                }
            }
            /* Se da formato a las tallas */
            $lista_tallas = array("XXS", "XS", "S", "M", "L", "XL", "XXL");
            $tallas_producto = "";
            for ($i = 0; $i < count($lista_tallas); $i++) {
                if (isset($datos[$lista_tallas[$i]])) {
                    $tallas_producto = $tallas_producto . "/" . $lista_tallas[$i];
                }
            }
            /* Se realiza las insert en la base de datos */
            if ($colores_producto != "" && $tallas_producto != "") {
                $id = $this->ingresarProducto($datos["Nombre"], $datos["Precio"], $datos["Descuento"], $datos["DescripcionG"], $datos["DescripcionP"], $datos["Cantidad"], $datos["Informacion"], $datos["TipoProducto"], $idMarca, $dirImagenPortada, $dirImagen1, $dirImagen2);
                if ($id > 0) {
                    if ($datos["TipoProducto"] == "Ropa") {
                        $this->ingresarRopa($id, $tallas_producto, $colores_producto, $datos["Genero"], $datos["SubTipoProducto"]);
                        $valido = true;
                    }
                    if ($datos["TipoProducto"] == "Accesorio") {
                        $this->ingresarAccesorio($id, $tallas_producto, $colores_producto, $datos["Genero"], $datos["SubTipoProducto"]);
                        $valido = true;
                    }
                }
            }
        }
        return $valido;
    }

    /* Ingresa un producto a la base de datos */

    function ingresarProducto($nombre, $precio, $descuento, $descripcionG, $descripcionP, $cantidad, $informacion, $tipo, $idMarca, $dirImagenPortada, $dirImagen1, $dirImagen2) {
        require './conexion.php';
        $valido = 0;
        $SQL_code = "INSERT INTO `tb_producto`(`Nombre`, `Precio`, `Descuento`, `DescripcionG`, `DescripcionP`, `Cantidad`, `Informacion`, `Tipo`, `Calificacion`, `Id_Marca`, `Dir_Imagen_Portada`, `Dir_Imagen_1`, `Dir_Imagen_2`) VALUES ('" . $nombre . "','" . $precio . "','" . $descuento . "','" . $descripcionG . "','" . $descripcionP . "','" . $cantidad . "','" . $informacion . "','" . $tipo . "','0','" . $idMarca . "','" . $dirImagenPortada . "','" . $dirImagen1 . "','" . $dirImagen2 . "')";
        $respuesta = $mysql->query($SQL_code);
        $id = $mysql->insert_id;
        if ($id > 0) {
            $valido = $id;
        }
        return$valido;
    }

    /* Ingresa ropa a la base de datos */

    function ingresarRopa($idProducto, $talla, $color, $genero, $tipo) {
        require './conexion.php';
        $SQL_code = "INSERT INTO `tb_ropa`(`Id_Producto`, `Talla`, `Color`, `Genero`, `Tipo`) VALUES ('" . $idProducto . "','" . $talla . "','" . $color . "','" . $genero . "','" . $tipo . "')";
        $respuesta = $mysql->query($SQL_code);
    }

    /* Ingresa un accesorio a la base de datos */

    function ingresarAccesorio($idProducto, $talla, $color, $genero, $tipo) {
        require './conexion.php';
        $SQL_code = "INSERT INTO `tb_accesorio`(`Id_Producto`, `Talla`, `Color`, `Genero`, `Tipo`) VALUES ('" . $idProducto . "','" . $talla . "','" . $color . "','" . $genero . "','" . $tipo . "')";
        $respuesta = $mysql->query($SQL_code);
    }

    /* Funcion que inicia las funciones para eliminar un producto de la base de datos */

    function eliminarProductoPorId($dato) {
        $valido = false;
        if (!empty($dato["Id"])) {
            if ($this->obtenerDatosDeProductoAEliminar($dato["Id"]) != "") {
                $prod = $this->obtenerDatosDeProductoAEliminar($dato["Id"]);
                $tipo = $prod["Tipo"];
                $dirImagenPortada = $prod["Dir_Imagen_Portada"];
                $dirImagen1 = $prod["Dir_Imagen_1"];
                $dirImagen2 = $prod["Dir_Imagen_2"];
                $this->eliminarImagenesProducto($dirImagenPortada, $dirImagen1, $dirImagen2);
                if ($tipo == "Ropa") {
                    $this->eliminarRopa($dato["Id"]);
                }
                if ($tipo == "Accesorio") {
                    $this->eliminarAccesorio($dato["Id"]);
                }
                $this->eliminarComentariosProducto($dato["Id"]);
                $this->eliminarProducto($dato["Id"]);
                $valido = true;
            }
        }
        return $valido;
    }

    /* Obtienen los datos de un producto para luego eliminarlo */

    function obtenerDatosDeProductoAEliminar($id) {
        require './conexion.php';
        $prod = "";
        $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Id=" . $id;
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $prod = $respuesta->fetch_assoc();
        }
        return $prod;
    }

    /* Elimina un producto de la base de datos */

    function eliminarProducto($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_producto` WHERE tb_producto.Id=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

    /* Elimina un ropa de la base de datos */

    function eliminarRopa($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_ropa` WHERE tb_ropa.Id_Producto=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

    /* Elimina un accesorio de la base de datos */

    function eliminarAccesorio($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_accesorio` WHERE tb_accesorio.Id_Producto=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

    /* Elimina la imagen del producto de la acarpeta images/productos */

    function eliminarImagenesProducto($dirImagenPortada, $dirImagen1, $dirImagen2) {
        unlink("./" . $dirImagenPortada);
        unlink("./" . $dirImagen1);
        unlink("./" . $dirImagen2);
    }

    /* elimina los comentarios relacionados al producto que se va a eliminar */

    function eliminarComentariosProducto($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_comentario` WHERE tb_comentario.Id_Producto=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

    /* Comprueba si es el id del producto que se va a eliminar */

    function comprobarEliminarProductoPorId($dato) {
        $valido = array();
        if (!empty($dato["Id"])) {
            require './conexion.php';
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Id=" . $dato["Id"];
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $prod = $respuesta->fetch_assoc();
                $valido["Nombre"] = $prod["Nombre"];
                $valido["DirImagenPortada"] = $prod["Dir_Imagen_Portada"];
            }
        }
        return $valido;
    }

    /* Busca el producto al que se le va a actualizar su descuento y precio */

    function buscarProductoAActualizarDescuento($dato) {
        $valido = array();
        if (!empty($dato["Id"])) {
            require './conexion.php';
            $SQL_code = "SELECT * FROM `tb_producto` WHERE tb_producto.Id=" . $dato["Id"];
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $prod = $respuesta->fetch_assoc();
                $valido["Nombre"] = $prod["Nombre"];
                $valido["DirImagenPortada"] = $prod["Dir_Imagen_Portada"];
                $valido["Descuento"] = $prod["Descuento"];
                $valido["Precio"] = $prod["Precio"];
            }
        }
        return $valido;
    }

    /* Actualiza el precio y el descuento del producto */

    function actualizarDescuentoProducto($datos) {
        $valido = false;
        if (!empty($datos["Id"]) && !empty($datos["nuevoPrecioProducto"])) {
            if ($datos["nuevoDescuentoProducto"] == "") {
                $datos["nuevoDescuentoProducto"] = 0;
            }
            require './conexion.php';
            $SQL_code = "UPDATE `tb_producto` SET `Precio`='" . $datos["nuevoPrecioProducto"] . "',`Descuento`='" . $datos["nuevoDescuentoProducto"] . "' WHERE tb_producto.Id=" . $datos["Id"];
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

    /* funcion que ingresa el id del producto al carrito */

    function ingresarProductoAlCarrito($dato) {
        $Id = $dato["Id"];
        session_start();
        if (isset($_SESSION["productos-carrito"])) {
            array_push($_SESSION["productos-carrito"], $Id);
        } else {
            $_SESSION["productos-carrito"] = array();
            array_push($_SESSION["productos-carrito"], $Id);
        }
        var_dump($_SESSION["productos-carrito"]);
        return $valido = true;
    }

    /* funcion que vacia el carrito */

    function vaciarCarrito() {
        session_start();
        unset($_SESSION["productos-carrito"]);
    }

    /* Obtiene los producto del carrito */

    function obtenerProductosCarrito($arrayProductosCarrito) {
        require './conexion.php';
        $carrito = array();
        for ($i = 0; $i < count($arrayProductosCarrito); $i++) {
            $SQL_code = "SELECT tb_producto.Id as 'Id', tb_ropa.Talla as 'Talla', tb_ropa.Color as 'Color', tb_ropa.Genero as 'Genero', tb_ropa.Tipo as 'TipoRopa', tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion', tb_marca.Nombre as 'Marca', tb_marca.Informacion as 'InfoMarca', tb_marca.Dir_Imagen as 'Dir_Imagen_Marca',tb_producto.Tipo as 'TipoProducto', tb_producto.Calificacion as 'Calificacion', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_ropa inner join tb_marca where tb_ropa.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id AND tb_producto.Id=" . $arrayProductosCarrito[$i];
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $prod = $respuesta->fetch_assoc();
                array_push($carrito, $prod);
            } else {
                $SQL_code = "SELECT tb_producto.Id as 'Id', tb_accesorio.Talla as 'Talla', tb_accesorio.Color as 'Color', tb_accesorio.Genero as 'Genero', tb_accesorio.Tipo as 'TipoRopa', tb_producto.Nombre as 'Nombre', tb_producto.Precio as 'Precio', tb_producto.Descuento as 'Descuento', tb_producto.DescripcionG as 'DescripcionG', tb_producto.DescripcionP as 'DescripcionP', tb_producto.Cantidad as 'Cantidad', tb_producto.Informacion as 'Informacion', tb_marca.Nombre as 'Marca', tb_marca.Informacion as 'InfoMarca', tb_marca.Dir_Imagen as 'Dir_Imagen_Marca',tb_producto.Tipo as 'TipoProducto', tb_producto.Calificacion as 'Calificacion', tb_producto.Dir_Imagen_Portada as 'Dir_Imagen_Portada', tb_producto.Dir_Imagen_1 as 'Dir_Imagen_1', tb_producto.Dir_Imagen_2 as 'Dir_Imagen_2' from tb_producto inner join tb_accesorio inner join tb_marca where tb_accesorio.Id_Producto=tb_producto.Id AND tb_producto.Id_Marca=tb_marca.Id AND tb_producto.Id=" . $arrayProductosCarrito[$i];
                $respuesta = $mysql->query($SQL_code);
                if ($respuesta->num_rows > 0) {
                    $prod = $respuesta->fetch_assoc();
                    array_push($carrito, $prod);
                }
            }
        }
        return $carrito;
    }

    /* Elimina un producto del carrito o o vacia completamente si no quedan mas productos dentro de este */

    function eliminarProductoDelCarrito($datos) {
        $valido = false;
        session_start();
        unset($_SESSION["productos-carrito"][$datos["posicion"]]);
        //si es el ultimo producto del carrito, devuelve un false y si aun queda un producto devuelve un true
        if (count($_SESSION["productos-carrito"]) == 0) {
            unset($_SESSION["productos-carrito"]);
        } else {
            $_SESSION["productos-carrito"] = array_values($_SESSION["productos-carrito"]);
            $valido = true;
        }
        return $valido;
    }

}

?>
