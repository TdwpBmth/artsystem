<?php
require_once "cargartodo.php";

class Archivo{



    const ERROR=-1;
    const EXITO=1;

    //De Iniciar Sesion
    const DATOS_INCORRECTOS=-6;
    const DATOS_VACIOS=-7;
    const USUARIO_INACTIVO=-8;



    public static function iniciarSesion($correo, $contrasenia){
        $resultado=self::EXITO;
        $conexion = Bd::obtenerConexion();
        $correo=$_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        Aplicacion::establecerMensajeAviso($contrasenia);
        $stmt = $conexion->prepare("SELECT vTipoUsuario, vNombreCompleto, iActivo, vPassword FROM tUsuario WHERE vCorreo = ?");
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $stmt->bind_result($tipoUsuario, $nombreCompleto, $activo, $contraseniaBD);
        $huboRegistros = $stmt->fetch();
        $stmt->close();
        var_dump($huboRegistros);
        if (!$huboRegistros || password_verify($contrasenia, $contraseniaBD )) {
            $resultado=self::DATOS_INCORRECTOS;
        } else if(!$activo){
            $resultado=self::USUARIO_INACTIVO;
        } else{
            $resultado=self::EXITO;
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION["correo"] = $correo;
            $_SESSION["nombre"] = $nombreCompleto;
            $_SESSION["tipoUsuario"] = $tipoUsuario;
        }
    
        return $resultado;
    }

}