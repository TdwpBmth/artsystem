<?php

require_once "bd.php";
require_once "Aplicacion.php";

class Departamento{

    public $nombre;
    public $encargado;

    const ERROR=-1;
    const EXITO=1;

    const REPETIDO=-2;

    public function __construct($nombre, $encargado){
        $this->nombre=$nombre;
        $this->encargado=$encargado;
    }

    public static function cargarDepartamentos(){
        $listaDepartamentos=array();
        $conexion = Bd::obtenerConexion();
        $stmt = "SELECT vNombre FROM tDepartamento";
        $result=$conexion->query($stmt);
        while($row=$result->fetch_assoc()){
            array_push($listaDepartamentos, $row['vNombre']);
        }
        return $listaDepartamentos;
    }

    public static function cargarDepartamentosTodo(){
        $listaDepartamentos=array();
        $conexion = Bd::obtenerConexion();
        $stmt = "SELECT vNombre, vEncargado FROM tDepartamento";
        $result=$conexion->query($stmt);
        while($row=$result->fetch_assoc()){
            $departamento=array($row['vNombre'],$row['vEncargado']);
            array_push($listaDepartamentos, $departamento);
        }
        return $listaDepartamentos;
    }

    public function registrarDepartamento(){
        $resultado=self::EXITO;
        $conexion=bd::obtenerConexion();
        $stmt=$conexion->prepare("INSERT INTO tDepartamento(vNombre, vEncargado) VALUES(?, ?)");
        $stmt->bind_param("ss", $this->nombre, $this->encargado);
        if($stmt->execute()){
            $resultado=self::ERROR;
            if ($conexion->errno == 1062) {
                $resultado = self::REPETIDO;
            }
        }
        $stmt->close();
        return $resultado;

    }

}
