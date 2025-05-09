<?php
class Db{
    private $host = 'localhost';
    private $db_name = 'JardinBrillante';
    private $username = 'root';
    private $password = '';
    public $conexion;

    public function __construct() {
        $this->conexion = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }

    public function obtenerProductos() {
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conexion, $query);
        $productos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }  
        return $productos;
    }

    public function inicioSesion($usuario, $contraseña) {
        $this->conexion->set_charset("utf8");
        $query = "SELECT * FROM customers WHERE name = '$usuario' AND password = '$contraseña'";
        $result = mysqli_query($this->conexion, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
