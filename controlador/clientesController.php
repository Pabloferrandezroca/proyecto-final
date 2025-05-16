<?php
require_once(__DIR__ . '/../modelo/Db.php');
class clientesController{
    private $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function iniciarSesion($usuario, $contraseña) {
        $resultado = $this->db->inicioSesion($usuario, $contraseña);
        return $resultado;
    }

    public function comprobarRegistro($usuario, $email, $contraseña){
        $this->db->comprobarRegistro($usuario, $email, $contraseña);
    }
}