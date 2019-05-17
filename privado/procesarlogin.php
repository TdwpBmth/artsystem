<?php
require_once "cargartodo.php";

if (isset($_POST["correo"]) && isset($_POST["contrasenia"])) {
    $respuesta = Usuario::iniciarSesion($_POST["correo"], $_POST["contrasenia"]);
    switch ($respuesta) {
        case Usuario::EXITO:
            header("Location: principalusuario.php");
            break;
        case Usuario::DATOS_INCORRECTOS:
            Aplicacion::establecerMensajeError("No se encontró ninguna cuenta relacionada con las credenciales introducidas. Favor de verificarlas.");
            header("Location: index.php");
            break;
        case Usuario::USUARIO_INACTIVO:
            Aplicacion::establecerMensajeError("Tu cuenta se encuentra deshabilitada. Favor de contactar con el administrador del sistema, o el encargado de su departamento.");
            header("Location: index.php");
            break;
    }    
} else {
    Aplicacion::establecerMensajeError("Favor de llenar todos los campos.");
    header("Location: login.php");
}