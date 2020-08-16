<?php

class Marca {

    private $Id;
    private $Nombre;
    private $Dir_Imagen;

    function Marca() {
        $this->Id = 0;
        $this->Nombre = "";
        $this->Dir_Imagen = "";
    }

    function getId() {
        return $this->Id;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getDir_Imagen() {
        return $this->Dir_Imagen;
    }

    function obtenerListaMarcas() {
        require './conexion.php';
        $valido = array();
        $SQl_code = "SELECT tb_marca.Nombre as 'nombreMarca', tb_marca.Dir_Imagen as 'Dir_Imagen', tb_marca.Id as 'Id_Marca' FROM `tb_marca`";
        $respuesta = $mysql->query($SQl_code);
        if ($respuesta->num_rows > 0) {
            $marcas = array();
            $i = 0;
            while ($marca = $respuesta->fetch_assoc()) {
                array_push($marcas, $marca);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["datos-marcas"] = $marcas;
            $valido["cant-marcas"] = $i;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    function ingresarMarca($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["nomImagenMarca"]) && !empty($datos["Nombre"]) && !empty($datos["Informacion"])) {
            $dirImagenMarca = "images/marcas/" . $datos["nomImagenMarca"];
            $SQl_code = "INSERT INTO `tb_marca`(`Nombre`, `Informacion`, `Dir_Imagen`) VALUES ('" . $datos["Nombre"] . "','" . $datos["Informacion"] . "','" . $dirImagenMarca . "')";
            $respuesta = $mysql->query($SQl_code);
            $id = $mysql->insert_id;
            if ($id > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

    function buscarMarcaPorId($datos) {
        require './conexion.php';
        $valido = array();
        if (!empty($datos["Id"])) {
            $SQl_code = "SELECT * FROM `tb_marca` WHERE tb_marca.Id=" . $datos["Id"];
            $respuesta = $mysql->query($SQl_code);
            if ($respuesta->num_rows > 0) {
                $marca=$respuesta->fetch_assoc();
                $nomImagenMarca= explode("/", $marca["Dir_Imagen"]);
                $valido["DirImagenMarca"]=$nomImagenMarca[2];
                $valido["Nombre"]=$marca["Nombre"];                
                $valido["Informacion"]=$marca["Informacion"];
            }
        }
        return $valido;
    }

    function actualizarMarca($datos) {
        $valido = false;
        if (!empty($datos["Nombre"]) && !empty($datos["Informacion"]) && !empty($datos["nomNuevaImagenMarca"])) {
            $dirNuevaImagenMarca = "images/marcas/" . $datos["nomNuevaImagenMarca"];
            $dirAntiguaImagenMarca= $this->obtenerDirImagenMarca($datos["Id"]);
            if($dirNuevaImagenMarca!=$dirAntiguaImagenMarca){
                unlink("./".$dirAntiguaImagenMarca);
            }           
            $valido=$this->accionActualizarMarca($datos["Nombre"], $datos["Informacion"], $dirNuevaImagenMarca, $datos["Id"]);
        }
        return $valido;
    }
    function obtenerDirImagenMarca($id){
        require './conexion.php';
        $SQL_code="SELECT tb_marca.Dir_Imagen as 'DirImagenMarca' from tb_marca WHERE tb_marca.Id=".$id;
        $respuesta=$mysql->query($SQL_code);
        $dirImagenMarca=$respuesta->fetch_assoc();
        return $dirImagenMarca["DirImagenMarca"];

    }
    function accionActualizarMarca($nombre,$informacion,$dirNuevaImagenMarca,$id){
        require './conexion.php';
        $valido = false;
        if (!empty($nombre) && !empty($informacion) && !empty($dirNuevaImagenMarca)) {
            $SQl_code = "UPDATE `tb_marca` SET `Nombre`='" . $nombre . "',`Informacion`='" . $informacion . "',`Dir_Imagen`='" . $dirNuevaImagenMarca . "' WHERE tb_marca.Id=" . $id;
            $respuesta = $mysql->query($SQl_code);
            if ($mysql->affected_rows > 0) {
                $valido = true;
            }
        }
        return $valido;
    }

}

?>
