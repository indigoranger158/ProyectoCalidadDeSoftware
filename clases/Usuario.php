<?php

Class Usuario {

    //Atributos de Usuario
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Email;
    private $Contrasena;
    private $Rol;

    //Contructor de Usuario
    function Usuario() {
        $this->Id = 0;
        $this->Nombre = "";
        $this->Apellido = "";
        $this->Email = "";
        $this->Contrasena = "";
        $this->Rol = "Cliente";
    }

    //Gets de Usuario
    function getId() {
        return $this->Id;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getEmail() {
        return $this->Email;
    }

    function getContrasena() {
        return $this->Contrasena;
    }

    function getRol() {
        return $this->Rol;
    }

    /* Valido si los datos introducidos en el formulario estan vacios o son erroneos */

    function validaRegistroVacio($DatosUsuario) {
        /* codigos errores de validacion:
         * Falta nombre=1
         * Falta apellido=2
         * Falta Email=3
         * Falta contraseña=4
         * Falta contrasena no concuerda=5
         * Codigo de datos correctos:
         * Datos correctos=6
         */
        $validacion = "0";
        if (empty($DatosUsuario["Nombre"])) {
            $validacion .= "/1";
        }
        if (empty($DatosUsuario["Apellido"])) {
            $validacion .= "/2";
        }
        if (empty($DatosUsuario["Email"])) {
            $validacion .= "/3";
        }
        if (empty($DatosUsuario["Contrasena"])) {
            $validacion .= "/4";
        }
        if ($DatosUsuario["Contrasena"] != $DatosUsuario["ConfContrasena"]) {
            $validacion .= "/5";
        }
        if (!isset($DatosUsuario["Terminos"])) {
            $validacion .= "/6";
        }
        $errores = explode("/", $validacion);
        return $errores;
    }

    /* Metodo que ingresa un usuario a la base datos */

    function ingresarUsuario($DatosUsuario) {
        require "./conexion.php";
        $validacion = "";

        //1. validacion de datos vacios
        if (empty($DatosUsuario["Nombre"]) || empty($DatosUsuario["Apellido"]) || empty($DatosUsuario["Email"]) || empty($DatosUsuario["Contrasena"]) || empty($DatosUsuario["ConfContrasena"]) || $DatosUsuario["Contrasena"] != $DatosUsuario["ConfContrasena"] || !isset($DatosUsuario["Terminos"])) {
            $accion_error = $this->validaRegistroVacio($DatosUsuario);
            if (!filter_var($DatosUsuario["Email"], FILTER_VALIDATE_EMAIL)) {
                /* Agrega un 3 si identifica un error en el formato del correo ademas de otros errores */
                $accion_error[] = "3";
            }
            return $accion_error;
        } else {
            if (!filter_var($DatosUsuario["Email"], FILTER_VALIDATE_EMAIL)) {
                /* Agrega un 3 si identifica solamente un error en el formato del correo y los demas datos estan correctos */
                $validacion = "0/3";
                $errores = explode("/", $validacion);
                return $errores;
            }
            if ($DatosUsuario["NomImagenUsuario"] == "") {
                $dirImagenUsuario = "images/usuarios/user-iconpredeterminado.jpg";
            } else {
                $dirImagenUsuario = "images/usuarios/" . $DatosUsuario["NomImagenUsuario"];
            }
            //codigo SQL que ira a la base de datos
            $SQL_code = "INSERT INTO tb_usuario(Nombre,Apellido,Email,Contrasena,Dir_Imagen_Perfil,Rol) "
                    . "VALUES ('" . $DatosUsuario["Nombre"] . "', '" . $DatosUsuario["Apellido"] . "', '" . $DatosUsuario["Email"] . ""
                    . "', '" . md5($DatosUsuario["Contrasena"]) . "', '" . $dirImagenUsuario . "', '" . $this->Rol . "')";
            $mysql->query($SQL_code);
            $id = $mysql->insert_id; // devuelve el valor del id del element0 q se  acaba de insertar

            if ($id > 0) {
                /* retorna un 7 que significa que no hay errores en los datos introducidos y que por los tanto el usuario 
                  se ingresara a la base de datos */
                session_start();
                $_SESSION["datos-usuario"] = array(
                    "Id" => $id,
                    "Nombre" => $DatosUsuario["Nombre"],
                    "Apellido" => $DatosUsuario["Apellido"],
                    "Email" => $DatosUsuario["Email"],
                    "Rol" => $this->Rol,
                    "Dir_Imagen_Perfil" => $dirImagenUsuario,
                    "Contrasena" => md5($DatosUsuario["Contrasena"])
                );
                $validacion = "7";
                return $validacion;
            }
        }
    }

    /* Valida si los datos del inicio de sesion estan vacios y devuelve los errores correspondientes */

    function validaInicioVacio($DatosUsuario) {
        /* codigos errores de validacion:
         * Falta Email=1
         * Falta contraseña=2

         */
        $validacion = "0";
        if (empty($DatosUsuario["Email"])) {
            $validacion .= "/1";
        }
        if (empty($DatosUsuario["Contrasena"])) {
            $validacion .= "/2";
        }
        $errores = explode("/", $validacion);
        return $errores;
    }

    /* Metodo que inicia un usuario en la pagina */

    function iniciarSesion($DatosUsuario) {
        require './conexion.php';
        $validacion = "";
        if (empty($DatosUsuario["Email"]) || empty($DatosUsuario["Contrasena"])) {
            $accion_error = $this->validaInicioVacio($DatosUsuario);
            if (!filter_var($DatosUsuario["Email"], FILTER_VALIDATE_EMAIL)) {
                /* Agrega un 3 si identifica un error en el formato del correo ademas de otros errores */
                $accion_error[] = "1";
            }
            return $accion_error;
        } else {
            if (!filter_var($DatosUsuario["Email"], FILTER_VALIDATE_EMAIL)) {
                /* Agrega un 3 si identifica solamente un error en el formato del correo y los demas datos estan correctos */
                $validacion = "0/1";
                $errores = explode("/", $validacion);
                return $errores;
            }
            $SQL_code = "SELECT * FROM tb_usuario WHERE Email='" . $DatosUsuario["Email"] . "' AND Contrasena='" . md5($DatosUsuario["Contrasena"]) . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $usuario = $respuesta->fetch_assoc();
                session_start();
                $_SESSION["datos-usuario"] = array(
                    "Id" => $usuario["Id"],
                    "Nombre" => $usuario["Nombre"],
                    "Apellido" => $usuario["Apellido"],
                    "Email" => $usuario["Email"],
                    "Rol" => $usuario["Rol"],
                    "Dir_Imagen_Perfil" => $usuario["Dir_Imagen_Perfil"],
                    "Contrasena" => $usuario["Contrasena"]
                );
                $validacion = "3";
            } else {
                $validacion = "4";
            }
            return $validacion;
        }
    }

    /* Para subir una imagen el administrador debera hacer una copia en la carpeta del proyecto llamada imagenes_para_nuevos_productos */

    function obtnerNumeroDeComentariosDeUsuarioAProducto($idUsuario, $idProducto) {
        require './conexion.php';
        $valido = 0;
        $SQl_code = "select count(tb_comentario.Id) as 'Cant_comentarios_usuario' FROM tb_comentario inner join tb_usuario inner join tb_producto where tb_comentario.Id_Usuario=tb_usuario.Id and tb_producto.Id=tb_comentario.Id_Producto and tb_usuario.Id=" . $idUsuario . " and tb_producto.Id=" . $idProducto;
        $respuesta = $mysql->query($SQl_code);
        $valido = $respuesta->fetch_assoc();

        return $valido["Cant_comentarios_usuario"];
    }

    /* Actualiza el nombre del usuario */

    function actualizaNombre($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["nuevoNombre"])) {
            $SQL_code = "UPDATE `tb_usuario` SET `Nombre`='" . $datos["nuevoNombre"] . "' WHERE tb_usuario.Id='" . $datos["Id"] . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                session_start();
                $_SESSION["datos-usuario"]["Nombre"] = $datos["nuevoNombre"];
                $valido = true;
            }
        }
        return $valido;
    }

    /* Actualiza el apellido del usuario */

    function actualizaApellido($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["nuevoApellido"])) {
            $SQL_code = "UPDATE `tb_usuario` SET `Apellido`='" . $datos["nuevoApellido"] . "' WHERE tb_usuario.Id='" . $datos["Id"] . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                session_start();
                $_SESSION["datos-usuario"]["Apellido"] = $datos["nuevoApellido"];
                $valido = true;
            }
        }
        return $valido;
    }

    /* Actualiza el correo del usuario */

    function actualizaCorreo($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["nuevoCorreo"]) && filter_var($datos["nuevoCorreo"], FILTER_VALIDATE_EMAIL)) {
            $SQL_code = "UPDATE `tb_usuario` SET `Email`='" . $datos["nuevoCorreo"] . "' WHERE tb_usuario.Id='" . $datos["Id"] . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                session_start();
                $_SESSION["datos-usuario"]["Email"] = $datos["nuevoCorreo"];
                $valido = true;
            }
        }
        return $valido;
    }

    /* Actualiza la contraseña del usuario solo si la contraseña introducida coincide con la registrada en la base datos */

    function actualizaContrasena($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["antiguaContrasena"]) && !empty($datos["nuevaContrasena"]) && md5($datos["antiguaContrasena"]) == $datos["Contrasena"]) {
            $SQL_code = "UPDATE `tb_usuario` SET `Contrasena`='" . md5($datos["nuevaContrasena"]) . "' WHERE tb_usuario.Id='" . $datos["Id"] . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                session_start();
                $_SESSION["datos-usuario"]["Contrasena"] = md5($datos["nuevaContrasena"]);
                $valido = true;
            }
        }
        return $valido;
    }

    /* Actualiza la imagen de usuario a la vez que borra la anterior de la carpeta de images/usuarios */

    function actualizaImagenUsuario($datos) {
        require './conexion.php';
        $valido = false;
        if (!empty($datos["nomNuevaImagenUsuario"])) {
            $SQL_code = "UPDATE `tb_usuario` SET `Dir_Imagen_Perfil`='images/usuarios/" . $datos["nomNuevaImagenUsuario"] . "' WHERE tb_usuario.Id='" . $datos["Id"] . "'";
            $respuesta = $mysql->query($SQL_code);
            if ($mysql->affected_rows > 0) {
                session_start();
                $_SESSION["datos-usuario"]["Dir_Imagen_Perfil"] = "images/usuarios/" . $datos["nomNuevaImagenUsuario"];
                $valido = true;
            }
        }
        return $valido;
    }

    /* Lista los usuario registrados en la base de datos */

    function listarUsuarios() {
        require './conexion.php';
        $valido = array();
        $SQL_code = "SELECT * FROM `tb_usuario`";
        $respuesta = $mysql->query($SQL_code);
        if ($respuesta->num_rows > 0) {
            $usuarios = array();
            $i = 0;
            while ($usuario = $respuesta->fetch_assoc()) {
                array_push($usuarios, $usuario);
                $i++;
            }
            $valido["valido"] = "true";
            $valido["datos-usuarios"] = $usuarios;
            $valido["cant-usuarios"] = $i;
        } else {
            $valido["valido"] = "false";
        }
        return $valido;
    }

    /* Comprueba si el id introducido coincide con alguno registrado en la base de datos para eliminarlo */

    function comprobarEliminarUsuarioPorId($dato) {
        $valido = array();
        if (!empty($dato["Id"])) {
            require './conexion.php';
            $SQL_code = "SELECT * FROM `tb_usuario` WHERE tb_usuario.Id=" . $dato["Id"];
            $respuesta = $mysql->query($SQL_code);
            if ($respuesta->num_rows > 0) {
                $prod = $respuesta->fetch_assoc();
                $valido["Nombre"] = $prod["Nombre"];
                $valido["Apellido"] = $prod["Apellido"];
                $valido["Email"] = $prod["Email"];
                $valido["DirImagenPerfil"] = $prod["Dir_Imagen_Perfil"];
            }
        }
        return $valido;
    }

    /* Funcion que inicia con las funciones para eliminar un usuario */

    function eliminarUsuarioPorId($dato) {
        $valido = false;
        if (!empty($dato["Id"])) {
            if ($dato["imagenPerfilUsuario"] != "images/usuarios/user-iconpredeterminado.jpg") {
                unlink("./" . $dato["imagenPerfilUsuario"]);
            }
            $this->eliminarComentariosUsuario($dato["Id"]);
            $this->eliminarUsuario($dato["Id"]);
            $valido = true;
        }
        return $valido;
    }

    /* Elimina los comentarios del usuario que se elimino */

    function eliminarComentariosUsuario($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_comentario` WHERE tb_comentario.Id_Usuario=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

    /* Realiza la eliminacion del usuario */

    function eliminarUsuario($id) {
        require './conexion.php';
        $SQL_code = "DELETE FROM `tb_usuario` WHERE tb_usuario.Id=" . $id;
        $respuesta = $mysql->query($SQL_code);
    }

}
?>

