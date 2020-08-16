<?php

include './clases/Usuario.php';
$Usuario = new Usuario();
$accion = $_POST["accion"];

switch ($accion) {
    case "Registrarse":
        $validacion = $Usuario->ingresarUsuario($_POST);
        break;
    case "IniciarSesion":
        $validacion = $Usuario->iniciarSesion($_POST);
        break;
    case "CerrarSesion":
        session_start();
        session_destroy();
        $validacion = TRUE;
        break;
    case "ActualizarNombre":
        $validacion = $Usuario->actualizaNombre($_POST);
        break;
    case "ActualizarApellido":
        $validacion = $Usuario->actualizaApellido($_POST);
        break;
    case "ActualizarCorreo":
        $validacion = $Usuario->actualizaCorreo($_POST);
        break;
    case "ActualizarContrasena":
        $validacion = $Usuario->actualizaContrasena($_POST);
        break;
    case "ActualizarImagenUsuario":
        $validacion = $Usuario->actualizaImagenUsuario($_POST);
        break;
    case "ComprobarEliminarUsuarioPorId":
        $validacion = $Usuario->comprobarEliminarUsuarioPorId($_POST);
        break;
    case "EliminarUsuarioPorId":
        $validacion = $Usuario->eliminarUsuarioPorId($_POST);
        break;
}
echo json_encode($validacion);
?>

