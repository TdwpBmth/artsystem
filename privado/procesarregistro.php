<?php
require_once "cargartodo.php";

if (isset($_POST['correo']) && isset($_POST['password']) && isset($_POST['departamento']) && isset($_POST['equipo']) && isset($_POST['tipoUsuario']) && isset($_POST['nombreCompleto'])){

    $usuario=new Usuario($_POST['correo'], $_POST['password'], $_POST['departamento'], $_POST['equipo'], $_POST['tipoUsuario'], $_POST['nombreCompleto'], date("Y-m-d"), 1);
    $respuesta=$usuario->registrarUsuario();
    switch($respuesta){
        case Usuario::CORREO_DUPLICADO:
        Aplicacion::establecerMensajeError("El correo ".$_POST['correo']." ya se encuentra registrado.");
        header("Location: registro.php");
        break;
        case Usuario::EXITO:
        header("Location: principal.php");
        break;
        case Usuario::ERROR:
        Aplicacion::establecerMensajeError("No tiene permisos para accesar a esta página.");
        header("Location: ../index.php");
        break;
        case Usuario::DATOS_INCORRECTOS:
        Aplicacion::establecerMensajeError("Los datos ingresados no fueron aceptados.");
        header("Location: registro.php");
        break;
    }

}else{
    Aplicacion::establecerMensajeError("Datos incompletos.");
        header("Location: registro.php");
}