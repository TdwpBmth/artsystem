<?php

require_once "bd.php";
require_once "Aplicacion.php";

class Usuario{

    public $correo;
    public $password;
    public $departamento;
    public $equipo;
    public $tipoUsuario;
    public $nombreCompleto;
    public $fechaAlta;

    
    const ERROR=-1;
    const EXITO=1;
    //De LOGIN
    const CORREO_DUPLICADO=-5;
    //De Iniciar Sesion
    const DATOS_INCORRECTOS=-6;
    const DATOS_VACIOS=-7;
    const USUARIO_INACTIVO=-8;

    public function __construct($correo,$password,$departamento,$equipo,$tipoUsuario,$nombreCompleto,$fechaAlta){
        $this->correo=$correo;
        $this->password=$password;
        $this->departamento=$departamento;
        $this->equipo=$equipo;
        $this->tipoUsuario=$tipoUsuario;
        $this->nombreCompleto=$nombreCompleto;
        $this->fechaAlta=$fechaAlta;
    }

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
    
    public function registrarUsuario(){
        $resultado=self::EXITO;
        $conexion=bd::obtenerConexion();

        $stmt=$conexion->prepare("INSERT INTO tUsuario(vCorreo, vPassword, vDepartamento, iEquipo, vTipoUsuario, vNombreCompleto, dFechaAlta, iActivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $contrasenia=hash("sha512",$this->password);
        $stmt->bind_param('sssisssi', $this->correo, $this->password, $this->departamento, $this->equipo, $this->tipoUsuario, $this->nombreCompleto, $this->fechaAlta, 1);

        if(!$stmt->execute()){
            if ($conexion->errno == 1062) {
                $resultado = self::CORREO_DUPLICADO;
            }
        }
        $stmt->close();
        return $resultado;

    }

}