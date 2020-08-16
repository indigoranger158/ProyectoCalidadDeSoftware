<?php

class Facturacion {

    private $Id;
    private $Id_Usuario;
    private $Direccion;
    private $Ciudad;
    private $Provincia;
    private $Codigo_Postal;

    function Facturacion() {
        $this->Id = 0;
        $this->Id_Usuario = "";
        $this->Direccion = "";
        $this->Ciudad = "";
        $this->Provincia = "";
        $this->Codigo_Postal = 0;
    }

    function getId() {
        return $this->Id;
    }

    function getId_Usuario() {
        return $this->Id_Usuario;
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

    /* Obtienen los datos de facturacion de acuerdo al id del usuario */

    function obtenerDatosFacturacion($id) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT * FROM `tb_datos_facturacion` WHERE tb_datos_facturacion.Id_Usuario=" . $id;
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $facturacion = $respuesta->fetch_assoc();
            $valido = $facturacion;
        }
        return $valido;
    }

    /* Ingresa los datos de facturacion de un usuario */

    function ingresarFacturacion($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["Direccion"]) && !empty($datos["Ciudad"]) && !empty($datos["Provincia"]) && !empty($datos["CodigoPostal"])) {
            $SQL_code = "INSERT INTO `tb_datos_facturacion`(`Id_Usuario`, `Direccion`, `Ciudad`, `Provincia`, `Codigo_Postal`) VALUES ('" . $datos["Id"] . "','" . $datos["Direccion"] . "','" . $datos["Ciudad"] . "','" . $datos["Provincia"] . "','" . $datos["CodigoPostal"] . "')";
            $respuesta = $mysql->query($SQL_code);
            $id = $mysql->insert_id;
            if ($id > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

    /* Actualiza los datos de facturacion de un usuario */

    function actualizarFacturacion($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["Direccion"]) && !empty($datos["Ciudad"]) && !empty($datos["Provincia"]) && !empty($datos["CodigoPostal"])) {
            $SQL_code = "UPDATE `tb_datos_facturacion` SET `Direccion`='" . $datos["Direccion"] . "',`Ciudad`='" . $datos["Ciudad"] . "',`Provincia`='" . $datos["Provincia"] . "',`Codigo_Postal`='" . $datos["CodigoPostal"] . "' WHERE tb_datos_facturacion.Id_Usuario=" . $datos["Id"];
            $respuesta = $mysql->query($SQL_code);
            $id = $mysql->affected_rows;
            if ($id > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

}
?>

