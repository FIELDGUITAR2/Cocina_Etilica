<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/AdminDAO.php");

class Admin extends Persona {

    public function __construct($id=0, $nombre="", $apellido="", $correo="", $clave=""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
    // Autenticación de administrador
    public function autenticar(){
        $conexion = new Conexion();
        $conexion->abrir();

        $adminDAO = new AdminDAO("", "", "", $this->correo, $this->clave);
        $conexion->ejecutar($adminDAO->autenticar());
        $tupla = $conexion->registro();

        $conexion->cerrar();

        if($tupla != null){
            // Si la consulta trae id, nombre, apellido...
            $this->id = $tupla[0];
            if (isset($tupla[1])) $this->nombre   = $tupla[1];
            if (isset($tupla[2])) $this->apellido = $tupla[2];
            return true;
        }else{
            return false;
        }
    }
}
?>
