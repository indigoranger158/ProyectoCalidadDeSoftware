<?php

class Tarjeta {

    private $Id;
    private $Id_Usuario;
    private $Numero_Tarjeta;
    private $Fecha_De_Expiracion;
    private $Codigo;
    private $Nombre;
    private $Titular;

    function Trajeta() {
        $this->Id = 0;
        $this->Id_Usuario = 0;
        $this->Numero_Tarjeta = "";
        $this->Fecha_De_Expiracion = "";
        $this->Codigo = "";
        $this->Nombre = "";
        $this->Titular = "";
    }

    function getId() {
        return $this->Id;
    }

    function getId_Usuario() {
        return $this->Id_Usuario;
    }

    function getNumero_Tarjeta() {
        return $this->Numero_Tarjeta;
    }

    function getFecha_De_Expiracion() {
        return $this->Fecha_De_Expiracion;
    }

    function getCodigo() {
        return $this->Codigo;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getTitular() {
        return $this->Titular;
    }

    /* Obtiene un listado de las tarjetas del usuario de acuerdo a su id */

    function obtieneTarjetasUsuario($id) {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT * FROM `tb_tarjeta` WHERE tb_tarjeta.Id_Usuario=" . $id;
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $tarjetas = array();
            $i = 0;
            while ($tarjeta = $respuesta->fetch_assoc()) {
                array_push($tarjetas, $tarjeta);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["datos-tarjetas"] = $tarjetas;
            $valido["cant-tarjetas"] = $i;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Ingresa un tarjeta a la base de datos */

    function ingresarTarjeta($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["Id"]) && !empty($datos["Numero_De_Tarjeta"]) && !empty($datos["Fecha_De_Expiracion"]) && !empty($datos["Codigo"]) && !empty($datos["Tarjeta"]) && !empty($datos["Titular"])) {
            $SQL_code = "INSERT INTO `tb_tarjeta`(`Id_Usuario`, `Numero_Tarjeta`, `Fecha_De_Expiracion`, `Codigo`, `Nombre`, `Titular`) VALUES ('" . $datos["Id"] . "','" . $datos["Numero_De_Tarjeta"] . "','" . $datos["Fecha_De_Expiracion"] . "','" . $datos["Codigo"] . "','" . $datos["Tarjeta"] . "','" . $datos["Titular"] . "')";
            $respuesta = $mysql->query($SQL_code);
            $id = $mysql->insert_id;
            if ($id > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

    /* Elimina una tarjeta de la base de datos */

    function eliminarTarjeta($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["Id"])) {
            $SQL_code = "DELETE FROM `tb_tarjeta` WHERE tb_tarjeta.Id=" . $datos["Id"];
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

