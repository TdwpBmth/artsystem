<?php
require_once "privado/cargartodo.php";

if (isset($_POST["correo"]) && isset($_POST["contrasenia"])) {
    $respuesta = Archivo::iniciarSesion($_POST["correo"], $_POST["contrasenia"]);

    switch ($respuesta) {
        case Archivo::EXITO:
            header("Location: principalusuario.php");
            break;
        case Archivo::DATOS_INCORRECTOS:
            Aplicacion::establecerMensajeError("No se encontró ninguna cuenta relacionada con las credenciales introducidas. Favor de verificarlas.");
            header("Location: index.php");
            break;
        case Archivo::USUARIO_INACTIVO:
            Aplicacion::establecerMensajeAviso("Tu cuenta se encuentra deshabilitada. Favor de contactar con el administrador del sistema, o el encargado de su departamento.");
            header("Location: index.php");
            break;
    }    
} else {
    Aplicacion::establecerMensajeError("Ups, datos incompletos.");
    header("Location: login.php");
}