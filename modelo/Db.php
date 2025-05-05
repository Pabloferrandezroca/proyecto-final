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
}
