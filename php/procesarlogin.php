<?php
require_once "php/cargartodo.php";

if (isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"])) {
    $respuesta = Usuario::iniciarSesion($_POST["txtCorreo"], $_POST["txtPassword"]);

    switch ($respuesta) {
        case Usuario::EXITO:
            header("Location: principalusuario.php");
            break;
        case Usuario::DATOS_INCORRECTOS:
            Aplicacion::establecerMensajeError("Ups, parece que tus datos están incorrectos.");
            header("Location: login.php");
            break;
        case Usuario::USUARIO_NO_VERIFICADO:
            Aplicacion::establecerMensajeAviso("Tu cuenta no se encuentra verificada, favor de revisar tu correo electrónico o registrarte de nuevo.");
            header("Location: registro.php");
            break;
    }    
} else {
    Aplicacion::establecerMensajeError("Ups, datos incompletos.");
    header("Location: login.php");
}